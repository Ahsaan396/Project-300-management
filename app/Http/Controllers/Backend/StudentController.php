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
        $data = DB::table('users')->get();
        return view('backend.subPage.addStudent',['data'=>$data]);
    }

    public function storeStudent(Request $request){
        $request->validate([
            'student_id' =>'required',
            'name' => 'required',
            'batch' => 'required',
            'pname' =>'required',
            'number' => 'required',

        ]);

        $data = DB::table('students')->insert([
            'name'=> $request->name,
            'student_id'=> $request->student_id,
            'batch'=> $request->batch,
            'pname'=> $request->pname,
            'number'=> $request->number,
            'acceptance'=> $request->acceptance,
            'supervisorId'=> session('id')
        ]);

        return redirect()->route('student.addStudent');
    }

  
    public function editStudent($id){
        $data = DB::table('students')->find($id);
        return view('backend.subPage.editStudent',['data'=>$data]); 
    }

    public function updateStudent($id, Request $request){
        $data = DB::table('students')->where('id',$id)->update([
            'name'=> $request->name,
            'student_id'=> $request->student_id,
            'batch'=> $request->batch,
            'pname'=> $request->pname,
            'number'=> $request->number,
            'acceptance'=> $request->acceptance
            // 'supervisorId'=> $request->$id
        ]);
        return redirect()->route('student.studentList');
    }

    public function deleteStudent($id){
        $data = DB::table('students')->where('id',$id)->delete();
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
