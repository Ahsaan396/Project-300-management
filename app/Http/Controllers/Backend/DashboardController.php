<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
      public function dashboard()
      {
      if(DB::table('users')->where(function ($query)
      {
          $query->where('id',Session('id'));
      })->count() == 1)
      {
            return view('frontend.layouts.dashboard');
      }
      else{
            return redirect('/');
      }
      }
}
