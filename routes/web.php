<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\SupervisorController;
use App\Http\Controllers\Backend\StudentController;
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
    Route::get('/supervisorList', [SupervisorController::class,'supervisorList'])->name('supervisorPanel.supervisorList');

    Route::get('/register', [SupervisorController::class,'register'])->name('supervisorPanel.register');

    Route::post('/store', [SupervisorController::class,'store'])->name('supervisorPanel.store');

    
});

Route::prefix('student')->group(function(){
    Route::get('/studentList', [StudentController::class,'studentList'])->name('student.studentList');

    Route::get('/addStudent',[StudentController::class,'addStudent'])->name('student.addStudent');

    Route::post('/storeStudent',[StudentController::class,'storeStudent'])->name('student.storeStudent');

    Route::get('/acceptedStudent',[StudentController::class,'acceptedStudent'])->name('student.acceptedStudent');

    Route::get('/editStudent/{id}', [StudentController::class,'editStudent'])->name('student.editStudent');

    Route::get('/deleteStudent/{id}', [StudentController::class,'deleteStudent'])->name('student.deleteStudent');
});

Route::get('/dashboard', function () {
    return view('frontend.layouts.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


