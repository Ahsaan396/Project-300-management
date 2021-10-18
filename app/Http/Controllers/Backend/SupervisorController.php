<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Validator;

class SupervisorController extends Controller
{
    public function supervisorList(){
    if(auth()->user()->usertype=='Admin'){
        $data = DB::table('users')->get();
        return view('backend.supervisorList',['data'=>$data]);
    }

    else{
        return redirect('/dashboard');
    }

    }

    public function register()
    {
    if(auth()->user()->usertype=='Admin')
    {
        return view('backend.subPage.register');
    }

    else{
        return redirect('/dashboard');
    }
    
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
          //  'usertype'=>'required',
            //'name'=>'required',
            //'email'=>'required|email|users:unique',
            'password' => 'required|min:8',
            'confirm password' => 'same:password|min:8'
        ]);
        if($request->password == $request->cpass){
        $data = DB::table('users')->insert([
            'usertype'=> $request->usertype,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ]);
        return redirect()->route('supervisorPanel.supervisorList');
    }

    else{
       //echo'<script> alert("Passwords do not match")</script>';
        return redirect( url()->previous());
    }
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

    public function boardMemberList(){

        if(auth()->user()->usertype=='Admin'){
        $data = DB::table('users')->where('bMember','Board Member')->get();
        return view('backend.boardMemberList',['data'=>$data]);
    }

    else{
        return redirect('/dashboard');
    }

    }

    public function addBoardMember($id){
        $data = DB::table('users')->where('id', $id)->update(['bMember'=>'Board Member']);
        return redirect( url()->previous());
    }



     public function remove($id){
        $data = DB::table('users')->where('id',$id)->update(['bMember'=>'NULL']);
        $data = DB::table('users')->where('id',$id)->update(['rReviewer'=>'NULL']);
        return redirect( url()->previous());
    }
}
