<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Resources\ServiceCategoryCollection;
use App\Http\Resources\ServiceCategoryDetailCollection;

class ServiceCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum','authadmin'])->only('store');
    }

    public function index(Request $request)
    {
        $data = ServiceCategory::where('is_active',1);

        if(isset($request->search_table) && trim($request->search_table)!=''){
            $search_columns = ['id','name','slug','price','discount','total','description','coverimage'];
            $data=advanceSearch(
                $searh_key=$request->search_table,
                $columns_array=$search_columns,
                $model_query=$data
            );
        }

        $data =$data->orderBy('id', 'DESC')->get();
        return new ServiceCategoryCollection($data);
        
    }

    public function store(Request $request)
    {
        
        $row =new ServiceCategory;
        
                        $row->name = $request->name;
                        
                        $row->slug = $request->slug;
                        
                        $row->price = $request->price;
                        
                        $row->discount = $request->discount;
                        
                        $row->total = $request->total;
                        
                        $row->description = $request->description;
                        
                        $image_key='coverimage';
                        $image_path='storage/Service Categories';
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
                            return apiResponse($result=false,$message='Cover Image is required',$data=null);
                        }
                        
                        $image_key='image';
                        $image_path='storage/Service Categories';
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
        $data = ServiceCategory::where('id',$id)->where('is_active',1);
        $data =$data->first();
        return new ServiceCategoryDetailCollection($data);
        
    }

    public function update(Request $request,$id)
    {
        
        $row = ServiceCategory::find($id);
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
                        $row->name=$request->name;
                        
                        $row->slug=$request->slug;
                        
                        $row->price=$request->price;
                        
                        $row->discount=$request->discount;
                        
                        $row->total=$request->total;
                        
                        $row->description=$request->description;
                        
                        $row->coverimage=$request->coverimage;
                        
                        $image_key='image';
                        $image_path='storage/Service Categories';
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
        
        $row=ServiceCategory::where('id',$id)->first();
        
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