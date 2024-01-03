<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderDetailCollection;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::where('is_active',1);

        if(isset($request->search_table) && trim($request->search_table)!=''){
            $search_columns = ['id','total_bill','book_type','order_completed','payment_completed','provider_completed','','user_id','service_id','transiction_id','to_provider_id'];
            $data=advanceSearch(
                $searh_key=$request->search_table,
                $columns_array=$search_columns,
                $model_query=$data
            );
        }

        $data =$data->orderBy('id', 'DESC')->get();
        return new OrderCollection($data);
        
    }

    public function store(Request $request)
    {
        
        $row =new Order;
        
                        $row->total_bill = $request->total_bill;
                        
                        $row->book_type = $request->book_type;
                        
                        $row->order_completed = $request->order_completed;
                        
                        $row->payment_completed = $request->payment_completed;
                        
                        $row->provider_completed = $request->provider_completed;
                        
                        
                        $row->user_id = $request->user_id;
                        
                        $row->service_id = $request->service_id;
                        
                        $row->transiction_id = $request->transiction_id;
                        
                        $row->to_provider_id = $request->to_provider_id;
                        
        $row->save();
        
        return apiResponse($result=true,$message='Stored Successfully',$data=null);
    }

    public function show(Request $request,$id)
    {
        $data = Order::where('id',$id)->where('is_active',1);
        $data =$data->first();
        return new OrderDetailCollection($data);
        
    }

    public function update(Request $request,$id)
    {
        
        $row = Order::find($id);
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
                        $row->total_bill=$request->total_bill;
                        
                        $row->book_type=$request->book_type;
                        
                        $row->order_completed=$request->order_completed;
                        
                        $row->payment_completed=$request->payment_completed;
                        
                        $row->provider_completed=$request->provider_completed;
                        
                        
                        $row->user_id=$request->user_id;
                        
                        $row->service_id=$request->service_id;
                        
                        $row->transiction_id=$request->transiction_id;
                        
                        $row->to_provider_id=$request->to_provider_id;
                        
        $row->save();
        
        return apiResponse($result=true,$message='Updated Successfully',$data=null);
    }

    public function destroy(Request $request,$id)
    {
        
        $row=Order::where('id',$id)->first();
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
        $row->delete();
        
        return apiResponse($result=true,$message='Deleted Successfully',$data=null);
    }
}