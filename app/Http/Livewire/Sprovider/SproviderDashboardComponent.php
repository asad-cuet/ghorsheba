<?php

namespace App\Http\Livewire\Sprovider;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Livewire\Component;

class SproviderDashboardComponent extends Component
{
    public function render()
    {
        $orders=Order::where('to_provider_id',Auth::user()->id)->orderBy('id','desc')->get(); 
        return view('livewire.sprovider.sprovider-dashboard-component',['orders'=>$orders])->layout('layouts.base');
    }
}