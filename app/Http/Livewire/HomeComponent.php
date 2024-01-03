<?php

namespace App\Http\Livewire;
use App\Models\ServiceCategory;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $fscategories = ServiceCategory::where('featured',1)->take(8)->get();
        return view('livewire.home-component',['fscategories' => $fscategories])->layout('layouts.base');
    }

    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
}
