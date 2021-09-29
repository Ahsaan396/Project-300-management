<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class SupervisorController extends Controller
{
    public function supervisorList(){
        $data['allData'] = User::all();
        return view('backend.supervisorList',$data);
    }

    public function register()
    {
        return view('backend.subPage.register');
    }

    public function store(Request $request)
    {
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('supervisorPanel.supervisorList');
    }

    public function editSupervisor($id){
        $editData = User::find($id);
        return view('backend.subPage.editSupervisor',compact('editData')); 
    }

    public function updateSupervisor($id, Request $request){
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('supervisorPanel.supervisorList');
    }

    public function deleteSupervisor($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('supervisorPanel.supervisorList'); 
    }

}
