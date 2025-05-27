<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Visitor;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Visitors extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $perPage = 10;

    public function placeholder(){
        return view('placeholder.spinner');
    }

    public function render()
    {
        // Fetch data for the dashboard
        $visitors = Visitor::latest()->paginate($this->perPage);
        $count = 1;
        
        return view('livewire.admin.visitors',compact('visitors','count'));
    }
}