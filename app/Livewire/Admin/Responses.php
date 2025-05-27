<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use App\Models\Response;
use Livewire\Component;
use Livewire\WithPagination;

class Responses extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $mail = false;
    public $body = '';

    public function placeholder(){
        return view('placeholder.spinner');
    }

    public function closeModal(){
        $this->mail = false;
    }

    public function openMail($id){
        $contact = Contact::findOrFail($id);

        $this->mail = true;
        $this->body = $contact->body;
    }

    
    public function openResponse($id){
        $response = Response::findOrFail($id);

        $this->mail = true;
        $this->body = $response->body;
    }


    public function render()
    {
        $responses = Response::search($this->search)->latest()->paginate($this->perPage);
        $count = 1;

        return view('livewire.admin.responses',compact('responses','count'));
    }
}
