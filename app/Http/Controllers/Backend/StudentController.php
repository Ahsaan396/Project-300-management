<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    
    public function studentList(){
        $data = DB::table('students')->get();
        return view('backend.studentList',['data'=>$data]);
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

  
    public function editStudent($id){
        $editData = Student::find($id);
        return view('backend.subPage.editStudent',compact('editData'));
    }

    public function updateStudent($id, Request $request){
        $data = Student::find($id);
        $data->name = $request->name;
        $data->student_id = $request->student_id;
        $data->batch = $request->batch;
        $data->pname = $request->pname;
        $data->number = $request->number;
        $data->acceptance = $request->acceptance;
        $data->save();
        return redirect()->route('student.studentList');
    }

    public function deleteStudent($id){
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('student.studentList');
    }


    public function accept($id){
        $data = DB::table('students')->where('id',$id)->update(['acceptance'=>'Accepted']);
        return redirect()->route('student.studentList');
    }

    public function acceptedStudent(){
        $data = DB::table('students')->get()->where('acceptance','Accepted');
        return view('backend.acceptedStudent',['data'=>$data]);
    }

    public function reject($id){
        $data = DB::table('students')->where('id',$id)->update(['acceptance'=>'Rejected']);
        return redirect()->route('student.studentList');
    }

    public function rejectedStudent(){
        $data = DB::table('students')->get()->where('acceptance','Rejected');
        return view('backend.rejectedStudent',['data'=>$data]);
    }

}
