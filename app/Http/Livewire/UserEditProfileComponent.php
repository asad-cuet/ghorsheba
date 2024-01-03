<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $image;
    public $newimage;
    public $phone;
    public $address;
    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name=$user->name;
        $this->email=$user->email;
        $this->phone=$user->phone;
        $this->image=$user->profile->image;
        $this->address=$user->profile->address;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
           'name'=> 'required',
            'email'=> 'required',
            'phone' => 'required'
      ]);
    }
    public function updateProfile()
    {
        $this->validate([
            'name'=> 'required',
            'email'=> 'required',
            'phone' => 'required'
        ]);
        $user = User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->phone=$this->phone;
        $user->save();
            if($this->newimage){
                if($this->image)
                {
                    unlink('assets/images/profiles/'.$this->image);
                }
                $imageName=Carbon::now()->timestamp. '.' . $this->newimage->extension();
                $this->newimage->storeAs('profiles',$imageName);
                $user->profile->image=$imageName;
             }
            $user->profile->address=$this->address;
            $user->profile->save();
            session()->flash('message','Profile has been updated successfully!');
        
       
    }
    public function render()
    {
        return view('livewire.user-edit-profile-component')->layout('layouts.base');
    }
}
