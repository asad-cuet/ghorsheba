<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceProvider;
use App\Models\ComplainCategory;
use Carbon\Carbon;

class AdminSVPController extends Controller
{
    function index()
    {
        $users=spvQuery()->get();
        $obj=[
            'users'=>$users
        ];
        return view('admin.service-providers.index',$obj);
    }


    function create()
    {
        $scategories = ComplainCategory::get();
        return view('admin.service-providers.create',compact('scategories'));
    }

    function store(Request $request)
    {
        $sp_user= new User;
        $sp_user->name=$request->name;
        $sp_user->email=$request->email;
        $sp_user->phone=$request->phone;
        $sp_user->utype='SVP';
        $sp_user->save();


        $sprovider =new ServiceProvider;
        $sprovider->complain_category_id=$request->complain_category_id;
        $sprovider->user_id=$sp_user->id;

        $image_key='image';
        $image_path='assets/images/sproviders';

        // dd($request->all());
        if($request->hasfile($image_key))       
        {
            $file=$request->file($image_key);
            if(isImage($file))
            {
                $path=$image_path;
                $image_file_name=uploadFile($file,$path);
                if($image_file_name)
                {
                    $sprovider[$image_key]=$image_file_name;
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

        $sprovider->save();


        return redirect(route('admin.service-providers'))->with('message','Service-Provider Added Succesfully');

    }

    function edit($id)
    {
        $user=User::find($id);
        $scategories = ComplainCategory::get();

        return view('admin.service-providers.edit',compact('user','scategories'));
    }

    function update(Request $request,$id)
    {
        $sp_user=User::find($id);
        $sp_user->name=$request->name;
        $sp_user->email=$request->email;
        $sp_user->phone=$request->phone;
        $sp_user->save();


        $sprovider =ServiceProvider::where('user_id',$sp_user->id)->first();;
        $sprovider->complain_category_id=$request->complain_category_id;

        $image_key='image';
        $image_path='assets/images/sproviders';

        // dd($request->all());
        if($request->hasfile($image_key))       
        {
            $file=$request->file($image_key);
            if(isImage($file))
            {
                $path=$image_path;
                $image_file_name=uploadFile($file,$path);
                if($image_file_name)
                {
                    $old_image=$sprovider[$image_key];
                    deleteFile($old_image);  
                    $sprovider[$image_key]=$image_file_name;
                }
                else
                {
                    return back()->with('warning','File Uploading Failed');
                }
            }
            else
            {
                return back()->with('warning','Uploaded image extension is not allowed');
            }
        }

        $sprovider->save();

        return redirect(route('admin.service-providers'))->with('message','Service-Provider Updated Succesfully');

    }

    function destroy($id)
    {
        $student=User::destroy($id);
        return redirect(route('admin.service-providers'))->with('message','Service-Provider Deleted Succesfully');

    }
}