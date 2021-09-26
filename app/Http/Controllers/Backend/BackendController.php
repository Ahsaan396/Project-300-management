<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BackendController extends Controller
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
        return redirect()->route('supervisorList');
    }

    public function addStudent(){
        $data['allData'] = User::all();
        return view('backend.addStudent',$data);
    }

    public function add(){
        return view('backend.subPage.addStudent');
    }
}
