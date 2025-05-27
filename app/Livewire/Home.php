<?php

namespace App\Livewire;

use App\Mail\Message;
use App\Models\NewsLetter;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;
use App\Models\Visitor;
use Illuminate\Support\Facades\Mail;

class Home extends Component
{

    public $newsletter = '';
    public $email;
    public $email_to = "virtualapptechnologies@gmail.com";
    public $name;
    public $subject;
    public $body;



    public function mount(){
        $agent = new Agent();
        $ip = Request::ip();
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

    public function subcribe(){
        $this->validate([
            'newsletter' => 'required|email',
        ]);

        $ip = Request::ip();
        $newsletter = NewsLetter::where('email', $this->newsletter)
            ->first();
        if ($newsletter) {
            $this->dispatch(
                'alert',
                title:'Successful',
                text:'Email already subscribed',
                icon:'info'
            );

        }else{
            NewsLetter::create([
                'email' => $this->newsletter,
            ]);
            $this->dispatch(
                'alert',
                title:'Successful',
                text:'Email subscribed successfully',
                icon:'success'
            );
            $this->newsletter = '';
        }
        

    }

    public function sendMessage(){

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
                    Mail::to($this->email_to) // To header
            ->send((new Message($data))->replyTo($this->email)); // Set Reply-To in the Mailable

        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Email sent successfully',
            icon:'success'
        );
        $this->reset(['name', 'email', 'subject', 'body']);
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
        return view('livewire.home');
    }
}


// g-recaptcha-response' => ['required',new ReCaptcha]