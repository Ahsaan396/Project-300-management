<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class VivaController extends Controller
{
    public function addToViva(){
        $arr = [];
        $arr2 = [];
        $arr3 = [];
        // array_push($arr3, 0); 

        // Getting student id from mark table.
        $id = DB::table('marks')->where('status', 'Passed')->select('id')->get();

        foreach($id as $i){
            $rid = $i->id;
            array_push($arr, $rid);
        }
        // sort($arr);

        // Getting supervisor id from mark table.
        $sid = DB::table('marks')->where('status', 'Passed')->select('supervisorID')->get();
        // dd($sid);
        foreach($sid as $si){           
            $rsid = $si->supervisorID;
            array_push($arr2, $rsid);  
        }

        $tid = DB::table('vivas')->select('id')->get();
        foreach($tid as $t){
            $ti = $t->id;
            array_push($arr3, $ti);
        }
       
        // dd($arr, $arr2);
        // dd($arr3, $arr);
       
        for ($i=0; $i < count($arr); $i++) { 
           if((sizeof($arr3) > 0) && (DB::table('vivas')->find($arr3))){
                $data = DB::table('vivas')->where('id', $arr3[$i])->update([
                    'sid' => $arr[$i],
                    'supervisorID' => $arr2[$i]
                ]);
              }
            else{
              $data = DB::table('vivas')->insert([
                'sid' => $arr[$i],
                'supervisorID' => $arr2[$i]
            ]);
            }     
        }

        if(auth()->user()->usertype == 'Admin'){
            $data = DB::table('vivas')->join('students','students.id', '=', 'vivas.sid')->select('students.name1','students.name2','students.student_id1','students.student_id2')->orderBy('student_id1')
            ->get();
            }
      
            else if(auth()->user()->usertype == 'Supervisor'){
              $data = DB::table('vivas')->join('students','students.id', '=', 'vivas.sid')->where('vivas.supervisorID',auth()->user()->id)->select('students.name1','students.name2','students.student_id1','students.student_id2')->orderBy('student_id1')
              ->get();
            }
            return view('backend.allowedForViva',['data'=>$data]);
    } 

    // public function addtodb($id){
    //     altre table vivas col_name dt_typ;
    // }

    // public function remove($id){
    //     alter table vivas drop column col_name;
    // }
}
