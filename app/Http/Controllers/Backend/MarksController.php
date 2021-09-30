<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function marks()
    {
        return view('backend.subPage.marks');
    }
}
