<?php

namespace App\Livewire\Admin;

use App\Mail\NewsLetter as MailNewsLetter;
use App\Models\NewsLetter as ModelsNewsLetter;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Newsletter extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $subject;
    public $body;
    public $image;

    public $search = '';
    public $perPage = 10;
    public $list = true;
    public $mailer = false;

    public function placeholder(){
        return view('placeholder.spinner');
    }


    public function openList(){
        $this->list = true;
        $this->mailer = false;
    }

    public function openMailer(){
        $this->list = false;
        $this->mailer = true;
    }

    public function deleteSubscriber(ModelsNewsLetter $subscriber){
        $subscriber->delete();
        $this->dispatch(
                'alert',
                title: 'Error',
                text: 'Email has been removed.',
                icon: 'success'
            );
    }

    public function sendNewsletter(){

        $this->validate([
            'subject' => 'required|string|max:255',
            'body'    => 'required|string',
            'image'   => 'nullable|image|max:4096', // Optional image validation
        ]);

        if ($this->image) {
            // Store image in public disk
            $path = $this->image->store('emails', 'public');

            // Generate public URL
            $url = asset('storage/' . $path);
        }

        // Prepare the newsletter data
        $data = [
            'subject' => $this->subject,
            'body'    => $this->body,
            'image'   => $url ?? null,
        ];

        // Get all subscribers
        $subscribers = ModelsNewsLetter::all();

        foreach ($subscribers as $subscriber) {
            try {
                // Send the newsletter to each subscriber
                Mail::to($subscriber->email) // To header
                ->send((new MailNewsLetter($data)));

                // Optionally, you can dispatch a success alert after all emails are sent
            } catch (\Exception $e) {
                // Handle errors for each subscriber
                $this->dispatch(
                    'alert',
                    title: 'Error',
                    text: "Email not sent to {$subscriber->email}",
                    icon: 'error'
                );
            }
        }

        // Dispatch a single success alert after sending to all subscribers
        $this->dispatch(
            'alert',
            title: 'Successful',
            text: 'Newsletter sent to all subscribers.',
            icon: 'success'
        );

        // Reset form fields if needed
        $this->reset(['subject', 'body', 'image']);

    }

    public function render()
    {
        $subscribers = ModelsNewsLetter::search($this->search)->latest()->paginate($this->perPage);
        $count = 1;

        return view('livewire.admin.newsletter',compact('subscribers','count'));
    }
}