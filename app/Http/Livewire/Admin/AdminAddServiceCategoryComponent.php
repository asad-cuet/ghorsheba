<?php

namespace App\Http\Livewire\Admin;

use App\Models\ComplainCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $description;
    public $coverimage;
    public $inclusion;
    public $notes;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
              'name' => 'required',
              'slug' => 'required',
              'image' => 'required|mimes:jpeg,png',
              'description' => 'required',
              'coverimage' => 'required',
              'inclusion'=>'required',
               'notes'=>'required'
        ]);
    }
    public function createNewCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'description' => 'required',
            'coverimage' => 'required',
            'inclusion'=>'required',
            'notes'=>'required'
      ]);
      $scategory = new ServiceCategory();
      $scategory->name= $this->name;
      $scategory->slug= $this->slug;
      $imageName=Carbon::now()->timestamp. '.' . $this->image->extension();
      $this->image->storeAs('categories',$imageName);
      $scategory->image=$imageName;
      $imageName=Carbon::now()->timestamp. '.' . $this->coverimage->extension();
      $this->coverimage->storeAs('services',$imageName);
      $scategory->coverimage=$imageName;
      $scategory->description=$this->description;
      $scategory->inclusion=str_replace("\n",'|',trim($this->inclusion));
      $scategory->notes=str_replace("\n",'|',trim($this->notes));
      $scategory->save();
      session()->flash('message','Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-service-category-component')->layout('layouts.base');
    }
}
