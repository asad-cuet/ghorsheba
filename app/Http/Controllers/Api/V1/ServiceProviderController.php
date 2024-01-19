<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Http\Resources\ServiceProviderCollection;
use App\Http\Resources\ServiceProviderDetailCollection;

class ServiceProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum','authadmin'])->only('store');
    }
    
    public function index(Request $request)
    {
        $data = ServiceProvider::where('is_active',1);

        if(isset($request->search_table) && trim($request->search_table)!=''){
            $search_columns = ['id','about','city','service_locations','user_id','complain_category_id','complain_category_id'];
            $data=advanceSearch(
                $searh_key=$request->search_table,
                $columns_array=$search_columns,
                $model_query=$data
            );
        }

        $data =$data->orderBy('id', 'DESC')->get();
        return new ServiceProviderCollection($data);
        
    }

    public function store(Request $request)
    {
        
        $row =new ServiceProvider;
        
                        $row->about = $request->about;
                        
                        $row->city = $request->city;
                        
                        $row->service_locations = $request->service_locations;
                        
                        $row->user_id = $request->user_id;
                        
                        $row->complain_category_id = $request->complain_category_id;
                        
                        $image_key='image';
                        $image_path='storage/Service Providers';
                        if($request->hasfile($image_key))       
                        {
                            $file=$request->file($image_key);
                            if(isImage($file))
                            {
                                $path=$image_path;
                                $image_file_name=uploadFile($file,$path);
                                if($image_file_name)
                                {
                                    $row[$image_key]=$image_file_name;
                                }
                                else
                                {
                                    return apiResponse($result=false,$message='Image Uploading Failed',$data=null);

                                }
                            }
                            else
                            {
                                return apiResponse($result=false,$message='Uploaded image extension is not allowed',$data=null);

                            }
                        }
                        else
                        {
                            return apiResponse($result=false,$message='Image is required',$data=null);
                        }
        $row->save();
        
        return apiResponse($result=true,$message='Stored Successfully',$data=null);
    }

    public function show(Request $request,$id)
    {
        $data = ServiceProvider::where('id',$id)->where('is_active',1);
        $data =$data->first();
        return new ServiceProviderDetailCollection($data);
        
    }

    public function update(Request $request,$id)
    {
        
        $row = ServiceProvider::find($id);
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
                        $row->about=$request->about;
                        
                        $row->city=$request->city;
                        
                        $row->service_locations=$request->service_locations;
                        
                        $row->user_id=$request->user_id;
                        
                        $row->complain_category_id=$request->complain_category_id;
                        
                        $row->complain_category_id=$request->complain_category_id;
                        
                        $image_key='image';
                        $image_path='storage/Service Providers';
                        if($request->hasfile($image_key))       
                        {
                            $file=$request->file($image_key);
                            if(isImage($file))
                            {
                                $path=$image_path;
                                $image_file_name=uploadFile($file,$path);
                                if($image_file_name)
                                {
                                    $old_image=$row[$image_key];
                                    deleteFile($old_image);  
                                    $row[$image_key]=$image_file_name;
                                    $row->save();
                                }
                                else
                                {
                                    return back()->with('warning','File Uploading Failed');
                                }
                            }
                            else
                            {
                                return back()->with('warning','Uploaded file extension is not allowed');
                            }
                        }
        $row->save();
        
        return apiResponse($result=true,$message='Updated Successfully',$data=null);
    }

    public function destroy(Request $request,$id)
    {
        
        $row=ServiceProvider::where('id',$id)->first();
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
        
                if($row['image']!='')
                {
                    deleteFile($row['image']);
                }$row->delete();
        
        return apiResponse($result=true,$message='Deleted Successfully',$data=null);
    }
}