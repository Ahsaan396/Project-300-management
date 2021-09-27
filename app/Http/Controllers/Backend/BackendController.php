<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
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
        return redirect()->route('supervisorPanel.supervisorList');
    }

    public function studentList(){
        $data['allData'] = Student::all();
        return view('backend.studentList',$data);
    }

    public function addStudent(){
        return view('backend.subPage.addStudent');
    }

    public function storeStudent(Request $request){
        $data = new Student();
        $data->name = $request->name;
        $data->student_id = $request->student_id;
        $data->batch = $request->batch;
        $data->pname = $request->pname;
        $data->number = $request->number;
        $data->save();
        return redirect()->route('supervisorPanel.addStudent');
    }
}
