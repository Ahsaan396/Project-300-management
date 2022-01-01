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
        $data = DB::table('marks')->join('students','students.id', '=', 'marks.id')->join('acceptances','acceptances.id', '=', 'marks.id')->select('students.name1','students.name2','students.student_id1','students.student_id2','marks.status','marks.tot_mark', 'acceptances.acceptance')->orderBy('student_id1')
        ->get();
       
            return view('Backend.result', ['data'=>$data]);
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
