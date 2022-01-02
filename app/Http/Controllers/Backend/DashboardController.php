<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class DashboardController extends Controller
{
      public function home()
      {
            return view('Backend.home');
      }

      public function result()
      {
        $arr = [];
        $arr2 = [];
        $arr3 = [];
        
        $id = DB::table('students')->select('id')->get();
        foreach ($id as $key => $i) {
          $r = $i->id;
        array_push($arr2,$r); 
         }

      //    sort($arr2);
        $marks = DB::table('marks')->select('status')->get();
        foreach ($marks as $key => $mark) {
         $result = $mark->status;
        array_push($arr,$result);
        }

        for ($i=0; $i < count($arr); $i++) { 
          if(($arr[$i] == "Passed"))
          {
           $arr[$i] = "Allowed for viva";
          }

          else if($arr[$i] == "Failed"){
            $arr[$i] = "Denied for viva";
          }
          else{
            $arr[$i] = "In Progress...";
          }

          }

          $accps = DB::table('acceptances')->select('acceptance')->get();
          foreach ($accps as $key => $accp) {
           $result = $accp->acceptance;
          array_push($arr3,$result);
          }

          for ($i=0; $i < count($arr3); $i++) { 
            if(($arr3[$i] == "Accepted"))
            {
             $arr3[$i] = "Allowed for presentation";
            }
  
            else if($arr3[$i] == "Rejected"){
              $arr3[$i] = "Denied for presentation";
            }
            else{
                  $arr3[$i] = "Enrolled";
            }
            }

            $cnt = 0;
            for ($i=0; $i < count($arr3); $i++) { 
                  if($arr3[$i] == "Enrolled")
                  $cnt++;
            }

            

        $data = DB::table('students')->select('name1', 'name2', 'student_id1', 'student_id2')->get();
       
        if($cnt == 0){
            $data = DB::table('marks')->join('students','students.id', '=', 'marks.id')->select('students.name1','students.name2','students.student_id1','students.student_id2')->get();
            return view('backend.result', ['data'=>$data, 'status'=>$arr]);
      }

      else{
            return view('backend.result', ['data'=>$data, 'status'=>$arr3]);
      }

      }

      public function rejectList(){
            $reject = DB::table('acceptances')->join('students','students.id', '=', 'acceptances.id')->where('acceptance', 'Rejected')->select('students.name1','students.name2','students.student_id1','students.student_id2')->get();
            
            return view('backend.subPage.rejectList', ['data'=>$reject]);
      }

      public function dashboard()
      {     
            if(auth()->user()->usertype=='Admin')
            {
                  $pData = DB::table('users')->where('id', auth()->user()->id)->get();
                  $sData = DB::table('students')->count();
                  $supData = DB::table('users')->count();
      
                  return view('frontend.layouts.dashboard',['pData'=>$pData,'sData'=>$sData,'supData'=>$supData]);
            }

            else if(auth()->user()->usertype=='Supervisor')
            {
                  $pData = DB::table('users')->where('id', auth()->user()->id)->get();
                  $sData = DB::table('students')->where('supervisorID', auth()->user()->id)->count();
                  $aSData = DB::table('acceptances')->where('acceptance','Accepted')->where('supervisorID',auth()->user()->id)->count();

                  $bSData = DB::table('acceptances')->where('bMID1', auth()->user()->id)->orWhere('bMID2',auth()->user()->id )->count();

                  $rSData = DB::table('acceptances')->where('rRID1', auth()->user()->id)->orWhere('rRID2', auth()->user()->id)->count();
      
                  return view('frontend.layouts.dashboard',['pData'=>$pData,'sData'=>$sData,'aSData'=>$aSData, 'bSData'=>$bSData, 'rSData'=>$rSData]);
            }

            else{
            return redirect('/');
            }
      }

}
