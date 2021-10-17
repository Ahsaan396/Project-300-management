<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
      public function dashboard()
      {
            if(DB::table('users')->where(function($query){
                  $query->where('id', Session('id'))
                  ->where('usertype','Admin');
            })->count() == 1)
            {
                  $pData = DB::table('users')->where('id', Session('id'))->get();
                  $sData = DB::table('students')->count();
                  $supData = DB::table('users')->count();
      
                  return view('frontend.layouts.dashboard',['pData'=>$pData,'sData'=>$sData,'supData'=>$supData]);
            }

            else if(DB::table('users')->where(function($query){
                  $query->where('id', Session('id'))
                  ->where('usertype','Supervisor');
            })->count() == 1)
            {
                  $pData = DB::table('users')->where('id', Session('id'))->get();
                  $sData = DB::table('students')->where('supervisorID', Session('id'))->count();
                  $aSData = DB::table('acceptances')->where('acceptance','Accepted')->count();

                  $bSData = DB::table('acceptances')->where('bMID1', Session('id'))->orWhere('bMID2', Session('id'))->count();

                  $rSData = DB::table('acceptances')->where('rRID1', Session('id'))->orWhere('rRID2', Session('id'))->count();
      
                  return view('frontend.layouts.dashboard',['pData'=>$pData,'sData'=>$sData,'aSData'=>$aSData, 'bSData'=>$bSData, 'rSData'=>$rSData]);
            }

            else{
            return redirect('/');
            }
      }

}
