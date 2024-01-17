<?php

namespace App\Http\Livewire;

use App\Models\ComplainCategory;
use Livewire\Component;

class ServiceCategoriesComponent extends Component
{
    public function render()
    {
        $scategories = ComplainCategory::all();
        return view('livewire.service-categories-component',['scategories' => $scategories])->layout('layouts.base');
    }
}
