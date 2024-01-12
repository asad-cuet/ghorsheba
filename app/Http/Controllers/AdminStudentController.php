<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminStudentController extends Controller
{
    function index()
    {
        $students=studentsQuery()->get();
        $obj=[
            'students'=>$students
        ];
        return view('admin.students.index',$obj);
    }


    function create()
    {
        return view('admin.students.create');
    }

    function store(Request $request)
    {
        $student= new User;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->room_no=$request->room_no;
        $student->student_id=$request->student_id;
        $student->utype='CST';
        $student->save();

        return redirect(route('admin.students'))->with('message','Student Added Succesfully');

    }

    function edit($id)
    {
        $student=User::find($id);
        return view('admin.students.edit',compact('student'));
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

        return redirect(route('admin.students'))->with('message','Student Updated Succesfully');

    }

    function destroy($id)
    {
        $student=User::destroy($id);
        return redirect(route('admin.students'))->with('message','Student Deleted Succesfully');

    }
}