<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Resources\ProfileCollection;
use App\Http\Resources\ProfileDetailCollection;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $data = Profile::where('is_active',1);

        if(isset($request->search_table) && trim($request->search_table)!=''){
            $search_columns = ['id','address','user_id'];
            $data=advanceSearch(
                $searh_key=$request->search_table,
                $columns_array=$search_columns,
                $model_query=$data
            );
        }

        $data =$data->orderBy('id', 'DESC')->get();
        return new ProfileCollection($data);
        
    }

    public function store(Request $request)
    {
        
        $row =new Profile;
        
                        $row->address = $request->address;
                        
                        $row->user_id = $request->user_id;
                        
                        $image_key='image';
                        $image_path='storage/Profiles';
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
                                    return back()->with('warning','Image Uploading Failed');
                                }
                            }
                            else
                            {
                                return back()->with('warning','Uploaded image extension is not allowed');
                            }
                        }
        $row->save();
        
        return apiResponse($result=true,$message='Stored Successfully',$data=null);
    }

    public function show(Request $request,$id)
    {
        $data = Profile::where('id',$id)->where('is_active',1);
        $data =$data->first();
        return new ProfileDetailCollection($data);
        
    }

    public function update(Request $request,$id)
    {
        
        $row = Profile::find($id);
        
        if($row==null || $row=='')
        {
            return apiResponse($result=false,$message='Not Found',$data=null);
        }
        
                        $row->address=$request->address;
                        
                        $row->user_id=$request->user_id;
                        
                        $image_key='image';
                        $image_path='storage/Profiles';
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
        
        $row=Profile::where('id',$id)->first();
        
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