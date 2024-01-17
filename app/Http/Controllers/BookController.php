<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function Cod($id)
    {


        $service_detail=ServiceCategory::find($id);


        $order = new Order;
        $order->user_id=Auth::id();
        $order->service_id=$id;
        $order->total_bill=0;
        $order->book_type='cod';
        $order->order_completed=0;
        $order->payment_completed=0;
        $order->to_provider_id=0;
        $order->provider_completed=0;

        $order->save();
        return back()->with('message','Service Ordered Succesfully');
    
        

    }


    public function online(Request $req,$id)
    {

       // dd($req->book_type.'  '.$req->tran_id);

        if($req->book_type==0)
        {
            return back()->with('failed',"Payment Mode cannot be empty");
        }

        if(Order::where('service_id',$id)->where('user_id',Auth::user()->id)->exists())
        {
            $prev_order=Order::where('service_id',$id)->where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
            if($prev_order->payment_completed==0)
            {
                return back()->with('failed',"You can't order yet as previous payment hasn't been approved");
            }
        }
        else
        {
            $service_detail=ServiceCategory::find($id);

            $price=$service_detail->price;
            $discount=$service_detail->discount;
            $total=$price-($price*$discount/100);
    
            $order = new Order;
            $order->user_id=Auth::id();
            $order->service_id=$id;
            $order->total_bill=$total;
            $order->book_type=$req->book_type;
            $order->transiction_id=$req->tran_id;
            $order->order_completed=0;
            $order->payment_completed=0;
            $order->to_provider_id=0;
            $order->provider_completed=0;
    
            $order->save();
            return back()->with('message','Service Ordered Succesfully');
        }


    }



    public function new_order()
    {
        $orders=Order::orderBy('Id','desc')->get(); 
                                              
        return view('livewire/admin/orders-controller',['orders'=>$orders]);
    }
}