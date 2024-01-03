<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactDetailCollection;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = Contact::where('is_active',1);

        if(isset($request->search_table) && trim($request->search_table)!=''){
            $search_columns = ['id','name','email','phone','message'];
            $data=advanceSearch(
                $searh_key=$request->search_table,
                $columns_array=$search_columns,
                $model_query=$data
            );
        }

        $data =$data->orderBy('id', 'DESC')->get();
        return new ContactCollection($data);
        
    }

    public function store(Request $request)
    {
        
        $row =new Contact;
        
                        $row->name = $request->name;
                        
                        $row->email = $request->email;
                        
                        $row->phone = $request->phone;
                        
                        $row->message = $request->message;
                        
        $row->save();
        
        return apiResponse($result=true,$message='Stored Successfully',$data=null);
    }

    public function show(Request $request,$id)
    {
        $data = Contact::where('id',$id)->where('is_active',1);
        $data =$data->first();
        return new ContactDetailCollection($data);
        
    }

    public function update(Request $request,$id)
    {
        
        $row = Contact::find($id);
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
                        $row->name=$request->name;
                        
                        $row->email=$request->email;
                        
                        $row->phone=$request->phone;
                        
                        $row->message=$request->message;
                        
        $row->save();
        
        return apiResponse($result=true,$message='Updated Successfully',$data=null);
    }

    public function destroy(Request $request,$id)
    {
        
        $row=Contact::where('id',$id)->first();
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
        $row->delete();
        
        return apiResponse($result=true,$message='Deleted Successfully',$data=null);
    }
}