<?php

namespace App\Http\Livewire;
use App\Models\ServiceCategory;
use Livewire\Component;

class ServiceCategoriesDetailComponent extends Component
{
    public $category_id;
    public function mount($category_id)
    {
        $this->category_id=$category_id;
       
    }
    public function render()
    {
        $scategory = ServiceCategory::where('slug', $this->category_id)->first();
        //dd($scategory->name);

        if($scategory!=null){
            return view('livewire.service-categories-detail-component',['scategory' => $scategory])->layout('layouts.base');
        }else{
            return abort(404);
        }
    }
}
