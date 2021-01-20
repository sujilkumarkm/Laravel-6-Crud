<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        return view('welcome',compact('students'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect()->route('home')->with('successMsg','Student Successfully added');
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit',compact('student'));

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = Student::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect()->route('home')->with('successMsg','Student information has been updated');
    }
    public function delete($id)
    {
        Student::find($id)->delete();
        return redirect()->route('home')->with('successMsg','Student information has been deleted');
    }
}
