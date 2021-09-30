<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\SupervisorController;
use App\Http\Controllers\Backend\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\MarksController;

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

    Route::get('/editSupervisor/{id}',[SupervisorController::class,'editSupervisor'])->name('supervisorPanel.editSupervisor');

    Route::post('/updateSupervisor/{id}',[SupervisorController::class,'updateSupervisor'])->name('supervisorPanel.updateSupervisor');

    Route::get('/deleteSupervisor/{id}',[SupervisorController::class,'deleteSupervisor'])->name('supervisorPanel.deleteSupervisor');


    
});

Route::prefix('student')->group(function(){
    Route::get('/studentList', [StudentController::class,'studentList'])->name('student.studentList');

    Route::get('/addStudent',[StudentController::class,'addStudent'])->name('student.addStudent');

    Route::post('/storeStudent',[StudentController::class,'storeStudent'])->name('student.storeStudent');

    Route::get('/editStudent/{id}', [StudentController::class,'editStudent'])->name('student.editStudent');

    Route::post('/updateStudent/{id}', [StudentController::class,'updateStudent'])->name('student.updateStudent');

    Route::get('/deleteStudent/{id}', [StudentController::class,'deleteStudent'])->name('student.deleteStudent');

    Route::get('/acceptedStudent',[StudentController::class,'acceptedStudent'])->name('student.acceptedStudent');

    Route::get('/accept/{id}',[StudentController::class,'accept'])->name('student.accept');

    Route::get('/rejectedStudent',[StudentController::class,'rejectedStudent'])->name('student.rejectedStudent');


    Route::get('/reject/{id}',[StudentController::class,'reject'])->name('student.reject');
});



Route::get('/dashboard', function () {
    return view('frontend.layouts.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


