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
    if(DB::table('users')->where(function ($query)
    {
            $query->where('id',Session('id'))
            ->where('usertype','Admin');
    }
        )->count() == 1){
        $data = DB::table('users')->get();
        return view('backend.supervisorList',['data'=>$data]);
    }

    else{
        return redirect('/dashboard');
    }

    }

    public function register()
    {
    if(DB::table('users')->where(function ($query)
        {
         $query->where('id',Session('id'))
        ->where('usertype','Admin');
        })->count() == 1)
    {
        return view('backend.subPage.register');
    }

    else{
        return redirect('/dashboard');
    }
    
    }

    public function store(Request $request)
    {
        $data = DB::table('users')->insert([
            'usertype'=> $request->usertype,
            'name'=> $request->name,
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

    public function boardMemberList(){

        if(DB::table('users')->where(function ($query)
    {
              $query->where('id',Session('id'))
            ->where('usertype','Admin');
          })->count() == 1){
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
        return redirect( url()->previous());
    }

}
