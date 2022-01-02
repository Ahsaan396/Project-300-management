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
  
      // Displaying marks
      public function showMarks(){
        $arr = [];
        $arr2 = [];

        $id = DB::table('marks')->select('id')->get();
        foreach ($id as $i) {
          $r = $i->id;
        array_push($arr2,$r);
         }

         sort($arr2);

        $marks = DB::table('marks')->select('sM', 'bM1', 'bM2', 'rM1', 'rM2')->get();
        foreach ($marks as $key => $mark) {
         $result = $mark->sM + (($mark->bM1 + $mark->bM2)/2) + (($mark->rM1 + $mark->rM2)/2);
         $data = DB::table('marks')->where('id',$arr2[$key])->update(['tot_mark'=>$result]);
        array_push($arr,$result);
        }

          //  dd($arr2);

        for ($i=0; $i < count($arr); $i++) { 
          if(($arr[$i] >= 40))
          {
          $marks = DB::table('marks')->where('id', $arr2[$i])->select('sM', 'bM1', 'bM2', 'rM1', 'rM2')->get();

          foreach($marks as $mark)
          {
              // dd($mark->sM);
            if(($mark->sM < 1) || ($mark->bM1 < 1) || ($mark->bM2 < 1) || ($mark->rM1 < 1) || ($mark->rM2 < 1))
            {
                $data = DB::table('marks')->where('id',$arr2[$i])->update(['status'=>'In progress...']);
            }

            else{
                $data = DB::table('marks')->where('id',$arr2[$i])->update(['status'=>'Passed']);
            }

          }
          }

         if($arr[$i] < 40){
          $marks = DB::table('marks')->where('id', $arr2[$i])->select('sM', 'bM1', 'bM2', 'rM1', 'rM2')->get();

          foreach($marks as $mark)
          {
            // dd($mark->sM);
            if(($mark->sM < 1) || ($mark->bM1 < 1) || ($mark->bM2 < 1) || ($mark->rM1 < 1) || ($mark->rM2 < 1))
            {
              $data = DB::table('marks')->where('id',$arr2[$i])->update(['status'=>'In progress...']);
            }
            else{
              $data = DB::table('marks')->where('id',$arr2[$i])->update(['status'=>'Failed']);
            }
          }
          }

        }

        if(auth()->user()->usertype=='Admin'){
        $data = DB::table('marks')->join('students','students.id', '=', 'marks.id')->select('students.student_id1','students.student_id2','marks.sM', 'marks.bM1', 'marks.bM2', 'marks.rM1', 'marks.rM2','marks.id','marks.status','marks.tot_mark')->orderBy('student_id1')
        ->get();
        }
  
        else if(auth()->user()->usertype=='Supervisor'){
          $data = DB::table('marks')->join('students','students.id', '=', 'marks.id')->where('marks.supervisorID',auth()->user()->id)->select('students.student_id1','students.student_id2','marks.sM', 'marks.bM1', 'marks.bM2', 'marks.rM1', 'marks.rM2','marks.id','marks.status','marks.tot_mark')->orderBy('student_id1')
          ->get();
        }
        return view('backend.marksA',['data'=>$data]);
      }

      // public function removeM($id){
      //   $data = DB::table('marks')->where('id', $id)
      //   ->update([
      //     'sM'=>'0',
      //     'bM1'=>'0',
      //     'bM2'=>'0',
      //     'rM1'=>'0',
      //     'rM2'=>'0',
      //   ]);
      //   return redirect( url()->previous());
      // }
}