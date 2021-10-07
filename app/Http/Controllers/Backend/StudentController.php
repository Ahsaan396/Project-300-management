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

            $data = DB::table('students')->orderBy('student_id1')->get();
    }

    else if(DB::table('users')->where(function ($query)
    {
          $query->where('id',Session('id'))
        ->where('usertype','Supervisor');
      })->count() == 1){ 

            $data = DB::table('students')->where('supervisorId',Session('id'))->orderBy('student_id1')->get();    
        }
        return view('backend.studentList',['data'=>$data]); 
    }


    // Add Student
    public function addStudent(){
        return view('backend.subPage.addStudent');
    }

    //Store Student
    public function storeStudent(Request $request){
        // $request->validate([
        //     'student_id' =>'required',
        //     'name' => 'required',
        //     'batch' => 'required',
        //     'pname' =>'required',
        //     'number' => 'required',

        // ]);

        $data = DB::table('students')->insert([
            'name1'=> $request->name1,
            'name2'=> $request->name2,
            'student_id1'=> $request->student_id1,
            'student_id2'=> $request->student_id2,
            'batch1'=> $request->batch1,
            'batch2'=> $request->batch2,
            'pname'=> $request->pname,
            'number'=> $request->number,
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
          'name1'=> $request->name1,
          'name2'=> $request->name2,
          'student_id1'=> $request->student_id1,
          'student_id2'=> $request->student_id2,
          'batch1'=> $request->batch1,
          'batch2'=> $request->batch2,
          'pname'=> $request->pname,
          'number'=> $request->number,
        ]);
        return redirect()->route('student.studentList');
    }



    // Accept Student
    public function accept($id){
      if(DB::table('acceptances')->find($id)){
        $data = DB::table('acceptances')->where('id',$id)->
        update([
        'acceptance'=>'Accepted',
      ]);
      }

    else {
      $data = DB::table('acceptances')->
        insert([
        'id'=>$id,
        'supervisorID'=>Session('id'),
        'acceptance'=>'Accepted',
      ]);
    } 
   
    return redirect( url()->previous());
    }


      // Reject Student
      public function reject($id){
        if(DB::table('acceptances')->find($id)){
          $data = DB::table('acceptances')->where('id',$id)->
            update([
            'acceptance'=>'Rejected',
            'bMember1'=>'NULL',
            'bMember2'=>'NULL',
            'rReviewer1'=>'NULL',
            'rReviewer2'=>'NULL'
          ]);
        }
  
       else {
        $data = DB::table('acceptances')->
        insert([
        'id'=>$id,
        'supervisorID'=>Session('id'),
        'acceptance'=>'Rejected',
      ]);
    }
  
    return redirect( url()->previous());
      }


      
    // Remove Student from acceptances table
    public function remove($id){
      $data = DB::table('acceptances')->where('id',$id)
      ->update([
        'acceptance'=>'NULL',
        'bMember1'=>'NULL',
        'bMember2'=>'NULL',
        'rReviewer1'=>'NULL',
        'rReviewer2'=>'NULL'
    ]);
      return redirect( url()->previous());
  }


   // Delete Student from students & acceptances table
   public function deleteStudent($id){
    $data = DB::table('students')->where('id',$id)->delete();
    $data = DB::table('acceptances')->where('id',$id)->delete();
    return redirect()->route('student.studentList');
}



    //Accepted Student
    public function acceptedStudent(){
    if(DB::table('users')->where(function ($query)
      {
          $query->where('id',Session('id'))
        ->where('usertype','Admin');
      })->count() == 1){

        $data = DB::table('acceptances')
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Accepted')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }
  
    else if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Supervisor');
      })->count() == 1){

        $data = DB::table('acceptances')->where('acceptances.supervisorID',Session('id'))
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Accepted')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }

        return view('backend.acceptedStudent',['data'=>$data]);
    }

    // Rejected Student
    public function rejectedStudent(){

    if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Admin');
      })->count() == 1){
        $data = DB::table('acceptances')
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Rejected')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }
  
    else if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Supervisor');
      })->count() == 1){

        $data = DB::table('acceptances')->where('acceptances.supervisorID',Session('id'))
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Rejected')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }
        return view('backend.rejectedStudent',['data'=>$data]);

    }

    // Allowed Student for board
    public function allowedForBoard(){
      if(DB::table('users')->where(function ($query)
        {
          $query->where('id',Session('id'))
        ->where('usertype','Admin');
      })->count() == 1){
    $data = DB::table('acceptances')->join('students', 'acceptances.supervisorID','=','students.supervisorID')->join('users','users.id','=','students.supervisorID')->where(function ($query)
      {
         $query->where('bMember1','!=','NULL')
          ->where('bMember2','!=','NULL');
        })->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname','acceptances.bMember1','acceptances.bMember2','acceptances.rReviewer1','acceptances.rReviewer2')->get();
      }

      else{
        $data = DB::table('acceptances')->where('acceptances.supervisorID',Session('id'))->join('students', 'acceptances.supervisorID','=','students.supervisorID')->join('users','users.id','=','students.supervisorID')->where(function ($query)
          {
             $query->where('bMember1','!=','NULL')
              ->where('bMember2','!=','NULL');
            })->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname','acceptances.bMember1','acceptances.bMember2','acceptances.rReviewer1','acceptances.rReviewer2')->get();
          }
        return view('backend.allowedForBoard',['data'=>$data]); 
    }

    // Getting Board Members name from users table 
    public function addToBoard($id){
      $data = DB::table('users')->where('bMember', 'Board Member')->get();
      return view('backend.subPage.addToBoard',['data'=>$data, 'id'=>$id]);
    }

    // Getting Supervisors name from users table
    public function addReportReviewer($id){
      $data = DB::table('users')->get();
      return view('backend.subPage.addReportReviewer',['data'=>$data, 'id'=>$id]);
    }

    // Storing Board Members name to acceptances table
    public function storeToBoard($id, Request $request){
      $data = DB::table('acceptances')->where('id',$id)->update([
        'bMember1'=> $request->bM1, 
        'bMember2'=>$request->bM2
      ]);

      return redirect()->route('student.acceptedStudent');
    }

    // Storing Supervisors name to acceptances table
    public function storeReportReviewer($id, Request $request){
      $data = DB::table('acceptances')->where('id',$id)->update([
        'rReviewer1'=> $request->rR1, 
        'rReviewer2'=>$request->rR2
      ]);

      return redirect()->route('student.acceptedStudent');
    }

}
