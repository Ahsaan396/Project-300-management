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

Route::prefix('supervisorPanel')->group(function(){
    Route::get('/supervisorList', [BackendController::class,'supervisorList'])->name('supervisorPanel.supervisorList');
    Route::get('/register', [BackendController::class,'register'])->name('supervisorPanel.register');

    Route::post('/store', [BackendController::class,'store'])->name('supervisorPanel.store');

    Route::get('/studentList', [BackendController::class,'studentList'])->name('supervisorPanel.studentList');

    Route::get('/addStudent',[BackendController::class,'addStudent'])->name('supervisorPanel.addStudent');

    Route::post('/storeStudent',[BackendController::class,'storeStudent'])->name('supervisorPanel.storeStudent');
});

Route::get('/dashboard', function () {
    return view('frontend.layouts.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


