<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;
use App\Models\ServiceProvider;
use Livewire\Component;

class OrderViewComponent extends Component
{
    public $order_id;
    public function mount($order_id)
    {
        $this->order_id=$order_id;
       
    }

    public function render()
    {
        $order=Order::find($this->order_id);
        $service_id=$order->service_id;
        $s_providers=ServiceProvider::where('service_category_id',$service_id)->get();
        return view('livewire.admin.order-view-component',['order'=>$order,'s_providers'=>$s_providers])->layout('layouts.base');;
    }
}