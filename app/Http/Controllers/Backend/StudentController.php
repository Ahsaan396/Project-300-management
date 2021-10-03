<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class StudentController extends Controller
{
    // Student List
    public function studentList(){
    if(DB::table('users')->where(function ($query)
    {
          $query->where('id',Session('id'))
        ->where('usertype','Admin');
      })->count() == 1){

            $data = DB::table('students')->get();
    }

    else if(DB::table('users')->where(function ($query)
    {
          $query->where('id',Session('id'))
        ->where('usertype','Supervisor');
      })->count() == 1){ 

            $data = DB::table('students')->where('supervisorId',Session('id'))->get();    
        }
        return view('backend.studentList',['data'=>$data]); 
    }


    // Add Student
    public function addStudent(){
        $data = DB::table('users')->get();
        return view('backend.subPage.addStudent',['data'=>$data]);
    }

    //Store Student
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

  
    // Edit student
    public function editStudent($id){
        $data = DB::table('students')->find($id);
        return view('backend.subPage.editStudent',['data'=>$data]); 
    }

    //Update Student
    public function updateStudent($id, Request $request){
        $data = DB::table('students')->where('id',$id)->update([
            'name'=> $request->name,
            'student_id'=> $request->student_id,
            'batch'=> $request->batch,
            'pname'=> $request->pname,
            'number'=> $request->number,
            'acceptance'=> $request->acceptance
        ]);
        return redirect()->route('student.studentList');
    }

    // Delete Student
    public function deleteStudent($id){
        $data = DB::table('students')->where('id',$id)->delete();
        return redirect()->route('student.studentList');
    }


    // Accept Student
    public function accept($id){
        $data = DB::table('students')->where('id',$id)->update(['acceptance'=>'Accepted']);
        return redirect()->route('student.studentList');
    }

    //Accepted Student
    public function acceptedStudent(){
    if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Admin');
      })->count() == 1){
        $data = DB::table('students')->where('acceptance','Accepted')->get();
    }
  
    else if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Supervisor');
      })->count() == 1){

        $data = DB::table('students')->where('supervisorId',Session('id'))->where('acceptance','Accepted')->get();
    }

        return view('backend.acceptedStudent',['data'=>$data]);
    }


    // Reject Student
    public function reject($id){
        $data = DB::table('students')->where('id',$id)->update(['acceptance'=>'Rejected']);
        return redirect()->route('student.studentList');
    }


    // Rejected Student
    public function rejectedStudent(){

    if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Admin');
      })->count() == 1){
        $data = DB::table('students')->where('acceptance','Rejected')->get();
    }
  
    else if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Supervisor');
      })->count() == 1){

        $data = DB::table('students')->where('supervisorId',Session('id'))->where('acceptance','Rejected')->get();
    }
        return view('backend.rejectedStudent',['data'=>$data]);

    }


    // Remove Student
    public function remove($id){
        $data = DB::table('students')->where('id',$id)->update(['acceptance'=>'NULL']);
        return redirect( url()->previous());
    }

}
