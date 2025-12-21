<?php

namespace App\Livewire;

use App\Mail\Confirmed;
use App\Mail\ThankYou;
use App\Models\Contact;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class PortfolioContactForm extends Component
{
    public $email;
    public $email_to = "theopensly@gmail.com";
    public $name;
    public $subject;
    public $body;

    public function mount(){
        $agent = new Agent();
        $ip = request()->ip();
        $device = $agent->device().'-'.$agent->platform().'-'.$agent->browser();
        $position = Location::get($ip);
        if ($position && isset($position->city, $position->regionName, $position->countryName)) {
            $location = "{$position->city}, {$position->regionName}, {$position->countryName}";
        } else {
            $location = 'Unknown';
        }

        $visitor = Visitor::where('ip_address', $ip)
            ->whereDate('created_at', now()->toDateString())
            ->first();

        if ($visitor) {
            $visitor->touch();
        } else {
            Visitor::create([
                'ip_address' => $ip,
                'device' => $device,
                'location' => $location,
            ]);
        }
    }

    public function sendMessage(){

        if (is_null($this->email) || is_null($this->name) || is_null($this->subject) || is_null($this->body)) {
            $this->dispatch(
                'alert',
                title: 'Error',
                text: 'All fields are required.',
                icon: 'error'
            );
            return;
        }

        $this->validate([
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);
        

        $data = [
            'name'      => $this->name,
            'email'     => $this->email,
            'subject'   => $this->subject,
            'body'      => $this->body,
        ];

       
        try{
            Mail::to($this->email_to) // To Admin
            ->send((new Confirmed($data))->replyTo($this->email)); // Set Reply-To in the Mailable

            Mail::to($this->email) // To mailer
            ->send((new ThankYou($data))); 

            Contact::create([
                'name'    => $this->name,
                'email'   => $this->email,
                'subject' => $this->subject,
                'body'    => $this->body,
                'ip' => Request::ip(),
            ]);

        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Email sent successfully',
            icon:'success'
        );
        $this->reset(['name','email','subject','body']);
        }
        catch(\Exception $e){
            $this->dispatch(
                'alert',
                title:'Error',
                text:'Email not sent',
                icon:'error'
            );
        }
       
        
    }

    public function render()
    {
        return view('livewire.portfolio-contact-form');
    }
}
