<?php

namespace App\Http\Livewire\Admin;

use App\Models\ComplainCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $description;
    public $is_active;
    public function mount($category_id)
    {
        $scategory = ComplainCategory::find($category_id);
        $this->category_id=$scategory->id;
        $this->name=$scategory->name;
        $this->slug=$scategory->slug;
        $this->image=$scategory->image;
        $this->description=$scategory->description;
        $this->is_active=$scategory->is_active;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
              'name' => 'required',
              'slug' => 'required',
              'description' => 'required',
        ]);
        if($this->newimage){
            $this->validateOnly($fields,[
                'newimage'=> 'required|mimes:jpeg,png',
            ]);
         }
    }

    public function updateServiceCategory(){
        $this->validate([
            'name'=> 'required',
            'slug'=> 'required',
            'description' => 'required',
        ]);
     if($this->newimage){
        $this->validate([
            'newimage'=> 'required|mimes:jpeg,png',
        ]);
     }
     
     $scategory = ComplainCategory::find($this->category_id);
     $scategory->name=$this->name;
     $scategory->slug=$this->slug;
     if($this->newimage){
        $imageName=Carbon::now()->timestamp. '.' . $this->newimage->extension();
        $this->newimage->storeAs('categories',$imageName);
        $scategory->image=$imageName;
     }
     $scategory->description=$this->description;
     $scategory->is_active=$this->is_active?? 0;

     $scategory->save();
     session()->flash('message','Category has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.base');
    }
}
