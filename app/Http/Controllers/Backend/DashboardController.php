<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
class DashboardController extends Controller
{
      public function dashboard()
      {
            return view('frontend.layouts.dashboard');
      }
}
