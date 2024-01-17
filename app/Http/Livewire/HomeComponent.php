<?php

namespace App\Http\Livewire;
use App\Models\ServiceCategory;
use Livewire\Component;
use Auth;
use App\Models\Order;

class HomeComponent extends Component
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
        if(Auth::user()!='')
        {
            if(Auth::user()->utype=='CST')
            {
                $scategories = ServiceCategory::all();
                return view('livewire.service-categories-component',['scategories' => $scategories])->layout('layouts.base');
            }
            else if(Auth::user()->utype=='SVP')
            {
                $orders=Order::where('to_provider_id',Auth::user()->id)->orderBy('id','desc')->get(); 
                return view('livewire.sprovider.sprovider-dashboard-component',['orders'=>$orders])->layout('layouts.base');
            }
            else if(Auth::user()->utype=='ADM')
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
                // return redirect(route('admin.new-order'));
            }
        }

        $fscategories = ServiceCategory::where('featured',1)->take(8)->get();
        return view('livewire.home-component',['fscategories' => $fscategories])->layout('layouts.base');
    }

    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
}
