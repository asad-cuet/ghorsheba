<?php

namespace App\Http\Livewire\Sprovider;
use App\Models\User;
use App\Models\ServiceProvider;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class EditSproviderProfileComponent extends Component
{
    use WithFileUploads;
    public $service_provider_id;
    public $about;
    public $image;
    public $newimage;
    public $city;
    public $service_category_id;
    public $service_locations;
    public function mount()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $this->service_provider_id=$sprovider->id;
        $this->about=$sprovider->about;
        $this->city=$sprovider->city;
        $this->image=$sprovider->image;
        $this->service_category_id=$sprovider->service_category_id;
        $this->service_locations=$sprovider->service_locations;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
             'about'=> 'required',
            'city'=> 'required',
            'service_category_id' => 'required',
            'service_locations' => 'required'
      ]);
    }
    public function updateProfile()
    {
        $this->validate([
            'about'=> 'required',
            'city'=> 'required',
            'service_category_id' => 'required',
            'service_locations' => 'required'
        ]);
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $sprovider->id=$this->service_provider_id;
        $sprovider->about=$this->about;
        $sprovider->city=$this->city;
        $sprovider->save();
            if($this->newimage){
                if($this->image)
                {
                    unlink('assets/images/sproviders/'.$this->image);
                }
                $imageName=Carbon::now()->timestamp. '.' . $this->newimage->extension();
                $this->newimage->storeAs('sproviders',$imageName);
                $sprovider->image=$imageName;
             }
             $sprovider->service_category_id=$this->service_category_id;
             $sprovider->service_locations=$this->service_locations;
            $sprovider->save();
            session()->flash('message','Profile has been updated successfully!');
        
       
    }
    public function render()
    {
        $scategories = ServiceCategory::all();
        return view('livewire.sprovider.edit-sprovider-profile-component',['scategories'=>$scategories])->layout('layouts.base');
    }
}
