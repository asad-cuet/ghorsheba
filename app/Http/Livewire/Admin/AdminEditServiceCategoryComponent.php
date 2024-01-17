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
    public $coverimage;
    public $inclusion;
    public $newcoverimage;
    public $featured;
    public function mount($category_id)
    {
        $scategory = ComplainCategory::find($category_id);
        $this->category_id=$scategory->id;
        $this->name=$scategory->name;
        $this->slug=$scategory->slug;
        $this->image=$scategory->image;
        $this->description=$scategory->description;
        $this->coverimage=$scategory->coverimage;
        $this->featured=$scategory->featured;
        $this->inclusion=str_replace("\n",'|',trim($scategory->inclusion));
        $this->notes=str_replace("\n",'|',trim($scategory->notes));
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
              'inclusion'=>'required',
              'notes'=>'required'
        ]);
        if($this->newimage){
            $this->validateOnly($fields,[
                'newimage'=> 'required|mimes:jpeg,png',
            ]);
         }
         if($this->newcoverimage){
            $this->validateOnly($fields,[
                'newcoverimage'=> 'required|mimes:jpeg,png',
            ]);
         }
    }

    public function updateServiceCategory(){
        $this->validate([
            'name'=> 'required',
            'slug'=> 'required',
            'description' => 'required',
            'inclusion'=>'required',
            'notes'=>'required'
        ]);
     if($this->newimage){
        $this->validate([
            'newimage'=> 'required|mimes:jpeg,png',
        ]);
     }
     if($this->newcoverimage){
        $this->validate([
            'newcoverimage'=> 'required|mimes:jpeg,png',
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
     if($this->newcoverimage){
        $imageName=Carbon::now()->timestamp. '.' . $this->newcoverimage->extension();
        $this->newcoverimage->storeAs('services',$imageName);
        $scategory->coverimage=$imageName;
     }
     $scategory->description=$this->description;
     $scategory->featured=$this->featured;
     $scategory->inclusion=str_replace("\n",'|',trim($this->inclusion));
     $scategory->notes=str_replace("\n",'|',trim($this->notes));
     $scategory->save();
     session()->flash('message','Category has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.base');
    }
}
