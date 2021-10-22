<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class MarksController extends Controller
{
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
        if(DB::table('marks')->where('bMId1', auth()->user()->id)->count()>0){
          $data = DB::table('marks')->where('id', $id)->where('bMId1', auth()->user()->id)->update([
            'bM1'=>$request->pMark
          ]);
        }
  
        if(DB::table('marks')->where('bMId2', auth()->user()->id)->count()>0){
            $data = DB::table('marks')->where('id', $id)->where('bMId2', auth()->user()->id)->update([
              'bM2'=>$request->pMark
            ]);
          }
       
        return redirect()->route('student.allowedForBoard');
      }
  
       // Storing Report Marks
      public function storeMarksR($id,Request $request){
        if(DB::table('marks')->where('rRId1', auth()->user()->id)->count() > 0){
          $data = DB::table('marks')->where('id', $id)->where('rRId1', auth()->user()->id)->update([
            'rM1'=>$request->rMark
          ]);
        }
  
        if(DB::table('marks')->where('rRId2', auth()->user()->id)->count()>0){
          $data = DB::table('marks')->where('id', $id)->where('rRId2', auth()->user()->id)->update([
            'rM2'=>$request->rMark
          ]);
        }
        return redirect()->route('student.assignedForReportReview');
      }
  
      public function showMarks(){
        if(auth()->user()->usertype=='Admin'){
        $data = DB::table('marks')->join('students','students.id', '=', 'marks.id')->orderBy('student_id1')->select('students.student_id1','students.student_id2','marks.sM', 'marks.bM1', 'marks.bM2', 'marks.rM1', 'marks.rM2','marks.id')
        ->get();
        }
  
        else if(auth()->user()->usertype=='Supervisor'){
          $data = DB::table('marks')->join('students','students.id', '=', 'marks.id')->where('marks.supervisorID',auth()->user()->id)->orderBy('student_id1')->select('students.student_id1','students.student_id2','marks.sM', 'marks.bM1', 'marks.bM2', 'marks.rM1', 'marks.rM2','marks.id')
          ->get();
        }

        // $sM =  DB::table('marks')->select('sM')->first();
        // $bM1 = DB::table('marks')->select('bM1')->first();
        // $bM2 = DB::table('marks')->select('bM2')->first();
        // $rM1 = DB::table('marks')->select('rM1')->first();
        // $rM2 = DB::table('marks')->select('rM2')->first();
        
        // $result = $sM + (($bM1+$bM2)/2) + (($rM1+$rM2)/2);
        // // dd($result);
        return view('backend.marks',['data'=>$data]);
      }

      public function passOrFail(){
          $sM =DB::table('marks')->get(['sM']);
          $bM1 =DB::table('marks')->get(['bM1']);
          $bM2 =DB::table('marks')->get(['bM2']);
          $rM1 =DB::table('marks')->get(['rM1']);
          $rM2 =DB::table('marks')->get(['rM2']);
          
          $result = $sM + (($bM1+$bM2)/2) + (($rM1+$rM2)/2);
          dd($result);
      }

      public function result($sM, $bM1, $bM2, $rM1, $rM2){
        $sM =DB::table('marks')->get(['sM']);
        $bM1 =DB::table('marks')->get(['bM1']);
        $bM2 =DB::table('marks')->get(['bM2']);
        $rM1 =DB::table('marks')->get(['rM1']);
        $rM2 =DB::table('marks')->get(['rM2']);
      }
}
