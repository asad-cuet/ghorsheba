<?php

namespace App\Http\Livewire\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerProfileComponent extends Component
{
    public function render()
    {
        $customer = User::where('id',Auth::user()->id)->first();
        return view('livewire.customer.customer-profile-component',['customer'=>$customer])->layout('layouts.base');
    }
}

