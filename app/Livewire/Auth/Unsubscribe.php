<?php

namespace App\Livewire\Auth;

use App\Models\NewsLetter;
use Livewire\Component;

class Unsubscribe extends Component
{
    public $email;

    public function unsubscribe(){
        $this->validate([
            'email' => 'required|email',
        ]);
        // Validate the email address

        $email = $this->email;
        $check = NewsLetter::where('email', $email)->first();

        if ($check) {
            $check->delete();
           $this->dispatch(
                'alert',
                title:'Successful',
                text:'Email unsubscribed successfully',
                icon:'success'
            );
            return;
        } else {
            $this->dispatch(
                'alert',
                title:'Error',
                text:'Email not found in our records',
                icon:'error'
            );
            return;
        }
        return;
    }

    public function render()
    {

        return view('livewire.auth.unsubscribe');
    }
}