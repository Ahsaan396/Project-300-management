<?php

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/supervisorList', [BackendController::class,'supervisorList'])->name('supervisorList');

Route::get('/dashboard', function () {
    return view('frontend.layouts.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


