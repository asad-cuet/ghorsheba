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
        ]);
    }
    public function createNewCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'description' => 'required',
      ]);
      $scategory = new ComplainCategory();
      $scategory->name= $this->name;
      $scategory->slug= $this->slug;
      $imageName=Carbon::now()->timestamp. '.' . $this->image->extension();
      $this->image->storeAs('categories',$imageName);
      $scategory->image=$imageName;
      $scategory->description=$this->description;
      $scategory->save();
      session()->flash('message','Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-service-category-component')->layout('layouts.base');
    }
}
