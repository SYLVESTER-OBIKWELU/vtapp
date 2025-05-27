<?php

namespace App\Livewire\Admin;

use App\Mail\Message;
use App\Models\Contact;
use App\Models\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $perPage = 10;

    public $body = null;

    public $mail = false;
    public $reply = false;

    public $reply_id = '';
    public $replies = '';
    public $image;

    public function placeholder(){
        return view('placeholder.spinner');
    }

    public function closeModal(){
        $this->mail = false;
        $this->reply = false;
        $this->reply_id = false;
    }

    public function openMail($id){
        $contact = Contact::findOrFail($id);
         
        if ($contact->status === 'new') {
            $contact->status ='read';
            $contact->save();
        }

        $this->mail = true;
        $this->reply = false;
        $this->body = $contact->body;
    }

    public function openReply($id){
        $this->mail = false;
        $this->reply = true;

        $contact = Contact::findOrFail($id);  
        $this->reply_id =$contact->id;

    }

    public function submitReply($id){
        $contact = Contact::findOrFail($id);
        $contact_id =$contact->id;
        $email =$contact->email;
        $subject =$contact->subject;

        $this->validate([
            'replies' => 'required',
        ]);

        // Validate the email address
        $url = null;
        if ($this->image) {
            // Store image in public disk
            $path = $this->image->store('emails', 'public');
            // Generate public URL
            $url = Storage::disk('public')->url($path);
        }

        $replies = $this->replies;
        $data = [
            'name'      => 'VTAPP',
            'email'     => $email,
            'subject'   => $subject,
            'body'      => $replies,
            'image'   => $url ?? null,
        ];

        try{
            Mail::to($email) // To mailer
            ->send((new Message($data))); 

        $this->dispatch(
            'alert',
            title:'Successful',
            text:'Email sent successfully',
            icon:'success'
        );
        }
        catch(\Exception $e){
            $this->dispatch(
                'alert',
                title:'Error',
                text:$e->getMessage(),
                icon:'error'
            );
        }

        sleep(1);
        Response::create([
                'email' => $email,
                'contact_id' => $contact_id,
                'body' => $replies,
            ]);
            $this->dispatch(
                'response',
                title:'Successful',
                text:'Email sent and response recorded successfully',
                icon:'success'
            );
            $this->reset(['replies', 'reply_id', 'image']);
            $this->closeModal();

    }

    public function deleteMessage(Contact $message){
        $message->delete();
         $this->dispatch(
                'alert',
                title: 'Error',
                text: 'Message has been removed.',
                icon: 'success'
            );
    }

    public function render()
    {
        $messages = Contact::search($this->search)->latest()->paginate($this->perPage);
        $count = 1;

        return view('livewire.admin.messages',compact('messages','count'));
    }
}
