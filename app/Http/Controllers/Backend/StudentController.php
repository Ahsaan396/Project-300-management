<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
//use Illuminate\Contracts\Session\Session;

class StudentController extends Controller
{
    // Student List
    public function studentList(){
    if(auth()->user()->usertype=='Admin'){

            $data = DB::table('students')->orderBy('student_id1')->get();
    }

    else if(auth()->user()->usertype=='Supervisor'){ 

            $data = DB::table('students')->where('supervisorId',auth()->user()->id)->orderBy('student_id1')->get();    
        }
        else{
          return redirect('/dashboard');
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
            'supervisorId'=> auth()->user()->id
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
        'supervisorID'=>auth()->user()->id,
        'acceptance'=>'Accepted',
      ]);

      $dat = DB::table('marks')->
      insert([
      'id'=>$id,
      'supervisorID'=>auth()->user()->id
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
            'rReviewer2'=>'NULL',
            'bMId1'=>'0',
            'bMId2'=>'0',
            'rRId1'=>'0',
            'rRId2'=>'0'
          ]);

          $dat = DB::table('marks')->where('id',$id)->
            update([
              'bMId1'=>'0',
              'bMId2'=>'0',
              'rRId1'=>'0',
              'rRId2'=>'0',
              'bM1'=>'0',
              'bM2'=>'0',
              'rM1'=>'0',
              'rM2'=>'0',
              'sM'=>'0',
          ]);
        }
  
      else {
        $data = DB::table('acceptances')->
        insert([
        'id'=>$id,
        'supervisorID'=>auth()->user()->id,
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
        'rReviewer2'=>'NULL',
        'bMId1'=>'0',
        'bMId2'=>'0',
        'rRId1'=>'0',
        'rRId2'=>'0'
    ]);

    $dat = DB::table('marks')->where('id',$id)
    ->update([
      'bMId1'=>'0',
      'bMId2'=>'0',
      'rRId1'=>'0',
      'rRId2'=>'0',
      'bM1'=>'0',
      'bM2'=>'0',
      'rM1'=>'0',
      'rM2'=>'0',
      'sM'=>'0',
  ]);
      return redirect( url()->previous());
  }

  // Remove Board Member traces
  public function removeB($id){
    $data = DB::table('acceptances')->where('id',$id)
    ->update([
      'bMember1'=>'NULL',
      'bMember2'=>'NULL',
      'bMId1'=>'0',
      'bMId2'=>'0'
  ]);

  $dat = DB::table('marks')->where('id',$id)
  ->update([
    'bMId1'=>'0',
    'bMId2'=>'0',
    'bM1'=>'0',
    'bM2'=>'0',
]);
    return redirect( url()->previous());
}

public function removeR($id){
  $data = DB::table('acceptances')->where('id',$id)
  ->update([
    'rReviewer1'=>'NULL',
    'rReviewer2'=>'NULL',
    'rRId1'=>'0',
    'rRId2'=>'0'
]);

$dat = DB::table('marks')->where('id',$id)
->update([
  'rRId1'=>'0',
  'rRId2'=>'0',
  'rM1'=>'0',
  'rM2'=>'0'
]);
  return redirect( url()->previous());
}


   // Delete Student from students & acceptances table
  public function deleteStudent($id){
    $data = DB::table('students')->where('id',$id)->delete();
    $data = DB::table('acceptances')->where('id',$id)->delete();
    $data = DB::table('marks')->where('id',$id)->delete();
    return redirect()->route('student.studentList');
}



    //Accepted Student
    public function acceptedStudent(){
    if(auth()->user()->usertype=='Admin'){

        $data = DB::table('acceptances')
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Accepted')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }
  
    else if(auth()->user()->usertype=='Supervisor'){

        $data = DB::table('acceptances')->where('acceptances.supervisorID',auth()->user()->id)
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Accepted')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }

    else{
      return redirect('/dashboard');
    }

        return view('backend.acceptedStudent',['data'=>$data]);
    }

    // Rejected Student
    public function rejectedStudent(){

    if(auth()->user()->usertype=='Admin'){
        $data = DB::table('acceptances')
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Rejected')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }
  
    else if(auth()->user()->usertype=='Supervisor'){

        $data = DB::table('acceptances')->where('acceptances.supervisorID',auth()->user()->id)
        ->join('students', 'acceptances.id','=','students.id')
        ->where('acceptance','Rejected')->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname')->get();
    }

    else{
      return redirect('/dashboard');
    }
        return view('backend.rejectedStudent',['data'=>$data]);

    }

    // Allowed Student for board
    public function allowedForBoard(){
      if(auth()->user()->usertype=='Admin'){
    $data = DB::table('acceptances')->join('students', 'acceptances.id','=','students.id')->where(function ($query)
      {
        $query->where('bMember1','!=','NULL')
          ->where('bMember2','!=','NULL');
        })->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname','acceptances.bMember1','acceptances.bMember2','acceptances.rReviewer1','acceptances.rReviewer2')->get();
      }

      else if(auth()->user()->usertype=='Supervisor'){
        $data = DB::table('acceptances')->where('acceptances.bMId1',auth()->user()->id)->orWhere('acceptances.bMId2',auth()->user()->id)->join('students', 'acceptances.id','=','students.id')->where(function ($query)
          {
            $query->where('bMember1','!=','NULL')
              ->where('bMember2','!=','NULL')->where('acceptance','Accepted');
            })->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname','acceptances.bMember1','acceptances.bMember2','acceptances.rReviewer1','acceptances.rReviewer2')->get();
          }
          
        else{
            return redirect('/dashboard');
          }
        return view('backend.allowedForBoard',['data'=>$data]); 
    }


      // Allowed Student for Report Review board
    public function assignedForReportReview(){
      if(auth()->user()->usertype=='Admin'){
    $data = DB::table('acceptances')->join('students', 'acceptances.id','=','students.id')->where(function ($query)
      {
        $query->where('rReviewer1','!=','NULL')
          ->where('rReviewer2','!=','NULL');
        })->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname','acceptances.bMember1','acceptances.bMember2','acceptances.rReviewer1','acceptances.rReviewer2')->get();
      }

      else if(auth()->user()->usertype=='Supervisor'){
        $data = DB::table('acceptances')->where('acceptances.rRId1',auth()->user()->id)->orWhere('acceptances.rRId2',auth()->user()->id)->join('students', 'acceptances.id','=','students.id')->where(function ($query)
          {
            $query->where('rReviewer1','!=','NULL')
              ->where('rReviewer2','!=','NULL')->where('acceptance','Accepted');
            })->orderBy('student_id1')->select('students.id','students.name1','students.name2','students.student_id1','students.student_id2','students.batch1','students.batch2', 'students.pname','acceptances.bMember1','acceptances.bMember2','acceptances.rReviewer1','acceptances.rReviewer2')->get();
          }

          else{
            return redirect('/dashboard');
          }

        return view('backend.assignedForReportReview',['data'=>$data]); 
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
        'bMember2'=>$request->bM2,
        'bMId1'=>$request->bMId1,
        'bMId2'=>$request->bMId2
      ]);

      $dat = DB::table('marks')->where('id',$id)->update([
        'bMId1'=>$request->bMId1,
        'bMId2'=>$request->bMId2
      ]);

      return redirect()->route('student.acceptedStudent');
    }

    // Storing Supervisors name to acceptances table
    public function storeReportReviewer($id, Request $request){
      $data = DB::table('acceptances')->where('id',$id)->update([
        'rReviewer1'=> $request->rR1, 
        'rReviewer2'=>$request->rR2,
        'rRId1'=>$request->rRId1, 
        'rRId2'=>$request->rRId2
      ]);

      $dat = DB::table('marks')->where('id',$id)->update([
        'rRId1'=>$request->rRId1,
        'rRId2'=>$request->rRId2
      ]);

      return redirect()->route('student.acceptedStudent');
    }
      
    // Supervisor Marks
    public function marks($id){
      return view('backend.subpage.marks',['id'=>$id]);
    }

    // Board Member Marks / Presentation Marks
    public function marksB($id){
      return view('backend.subpage.marksB',['id'=>$id]);
    }

    // Report Marks
    public function marksR($id){
      return view('backend.subpage.marksR',['id'=>$id]);
    }

    // Storing Supervisor Marks
    public function storeMarks($id,Request $request){
      if(DB::table('marks')->where('supervisorID', auth()->user()->id)){
        $data = DB::table('marks')->where('id', $id)->update([
          'sM'=>$request->sMark
        ]);
      }
      return redirect()->route('student.acceptedStudent');
    }

     // Storing Board Member Marks / Presentation Marks
    public function storeMarksB($id,Request $request){
      if(DB::table('marks')->where('bMId1', auth()->user()->id)->count()== 1){
        $data = DB::table('marks')->where('id', $id)->update([
          'bM1'=>$request->pMark
        ]);
      }

      else if(DB::table('marks')->where('bMId2', auth()->user()->id)->count()== 1){
          $data = DB::table('marks')->where('id', $id)->update([
            'bM2'=>$request->pMark
          ]);
        }
     
      return redirect()->route('student.allowedForBoard');
    }

     // Storing Report Marks
    public function storeMarksR($id,Request $request){
      if(DB::table('marks')->where('rRId1', auth()->user()->id)->count()== 1){
        $data = DB::table('marks')->where('id', $id)->update([
          'rM1'=>$request->rMark
        ]);
      }

      else if(DB::table('marks')->where('rRId2', auth()->user()->id)->count()== 1){
        $data = DB::table('marks')->where('id', $id)->update([
          'rM2'=>$request->rMark
        ]);
      }
      return redirect()->route('student.assignedForReportReview');
    }
}

