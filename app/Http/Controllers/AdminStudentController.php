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
}