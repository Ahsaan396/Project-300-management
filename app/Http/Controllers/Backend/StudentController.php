<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    
    public function studentList(){
        $data['allData'] = Student::all();
        return view('backend.studentList',$data);
    }

    public function addStudent(){
        return view('backend.subPage.addStudent');
    }

    public function storeStudent(Request $request){
        $request->validate([
            'student_id' =>'required',
            'name' => 'required',
            'batch' => 'required',
            'pname' =>'required',
            'number' => 'required',

        ]);
        $data = new Student();
        $data->name = $request->name;
        $data->student_id = $request->student_id;
        $data->batch = $request->batch;
        $data->pname = $request->pname;
        $data->number = $request->number;
        $data->acceptance = $request->acceptance;
        $data->save();
        return redirect()->route('student.addStudent');
    }

    public function acceptedStudent(){
        $data['allData'] = Student::all();
        return view('backend.acceptedStudent',$data);
    }

    public function editStudent(){

        return redirect()->route('student.studentList');
    }

    public function deleteStudent(){

        return redirect()->route('student.studentList');
    }
}
