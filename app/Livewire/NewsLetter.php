<?php

namespace App\Livewire;

use App\Models\NewsLetter as ModelsNewsLetter;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class NewsLetter extends Component
{
    public $newsletter = '';

     public function subcribe(){
        $this->validate([
            'newsletter' => 'required|email',
        ]);

        $ip = Request::ip();
        $newsletter = ModelsNewsLetter::where('email', $this->newsletter)
            ->first();
        if ($newsletter) {
            $this->dispatch(
                'alert',
                title:'Successful',
                text:'Email already subscribed',
                icon:'info'
            );

        }else{
            ModelsNewsLetter::create([
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

    public function render()
    {
        return view('livewire.news-letter');
    }
}
