<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class SupervisorController extends Controller
{
    public function supervisorList(){
        $data = DB::table('users')->get();
        return view('backend.supervisorList',['data'=>$data]);
    }

    public function register()
    {
        return view('backend.subPage.register');
    }

    public function store(Request $request)
    {
        $data = DB::table('users')->insert([
            'usertype'=> $request->usertype,
            'name'=> $request->name,
            'batch'=> $request->batch,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ]);
        return redirect()->route('supervisorPanel.supervisorList');
    }

    public function editSupervisor($id){
        $data = DB::table('users')->find($id);
        return view('backend.subPage.editSupervisor',['data'=>$data]); 
    }

    public function updateSupervisor($id, Request $request){
        $data = DB::table('users')->where('id',$id)->update([
            'usertype'=> $request->usertype,
            'name'=> $request->name,
            'email'=> $request->email,
        ]);
        return redirect()->route('supervisorPanel.supervisorList');
    }

    public function deleteSupervisor($id){
        $data = DB::table('users')->where('id',$id)->delete();
        return redirect()->route('supervisorPanel.supervisorList'); 
    }

}
