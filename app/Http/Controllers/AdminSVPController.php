<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('admin.service-providers.create');
    }

    function store(Request $request)
    {
        $student= new User;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->room_no=$request->room_no;
        $student->student_id=$request->student_id;
        $student->utype='SPV';
        $student->save();

        return redirect(route('admin.service-providers'))->with('message','Service-Provider Added Succesfully');

    }

    function edit($id)
    {
        $user=User::find($id);
        return view('admin.service-providers.edit',compact('user'));
    }

    function update(Request $request,$id)
    {
        $student=User::find($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->room_no=$request->room_no;
        $student->student_id=$request->student_id;
        $student->save();

        return redirect(route('admin.service-providers'))->with('message','Service-Provider Updated Succesfully');

    }

    function destroy($id)
    {
        $student=User::destroy($id);
        return redirect(route('admin.service-providers'))->with('message','Service-Provider Deleted Succesfully');

    }
}