<?php

namespace App\Livewire\Admin;

use App\Models\NewsLetter;
use App\Models\Portfolio;
use App\Models\Response;
use Livewire\Component;
use App\Models\Visitor;

class Dashboard extends Component
{
    public function placeholder(){
        return view('placeholder.spinner');
    }

    public function render()
    {
        // Fetch data for the dashboard
        $visitors = Visitor::all();
        $responses = Response::all();
        $subscribers = NewsLetter::all();
        $portfolio = Portfolio::all();
        
        return view('livewire.admin.dashboard',compact('visitors','responses','subscribers','portfolio'));
    }
}