<?php

namespace App\Http\Livewire\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

use Livewire\Component;

class CustomerDashboardComponent extends Component
{
    public function render()
    {
        $orders=Order::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('livewire.customer.customer-dashboard-component',['orders'=>$orders])->layout('layouts.base');
    }
}
