<?php

namespace App\Livewire\Admin;

use App\Models\Portfolio as ModelsPortfolio;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Portfolio extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $perPage = 10;

    public function placeholder(){
        return view('placeholder.spinner');
    }

    public function render()
    {
        // Fetch data for the portfolio page
        $visitors = ModelsPortfolio::latest()->paginate($this->perPage);
        $count = 1;
        
        return view('livewire.admin.portfolio',compact('visitors','count'));
    }
}
