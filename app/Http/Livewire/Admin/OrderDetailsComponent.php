<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;

use Livewire\Component;

class OrderDetailsComponent extends Component
{
    public $history;
    public function orderHistory()
    {
        $this->history=1;
    }
    public function orderNew()
    {
        $this->history=0;
    }
    public function render()
    {
        if($this->history==1)
        {
            $orders=Order::where('order_completed',1)->orderBy('updated_at','desc')->get(); 
        }
        else
        {
            $orders=Order::where('order_completed',0)->orderBy('id','desc')->get(); 
        }
        
        return view('livewire.admin.order-details-component',['orders'=>$orders])->layout('layouts.base');
    }
}
