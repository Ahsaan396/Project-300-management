<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SupervisorController;
use App\Http\Controllers\Backend\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\MarksController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/logout',[AuthenticatedSessionController::class,'logout'])->name('logout');

Route::prefix('supervisorPanel')->group(function(){
    Route::get('/supervisorList', [SupervisorController::class,'supervisorList'])->name('supervisorPanel.supervisorList');

    Route::get('/register', [SupervisorController::class,'register'])->name('supervisorPanel.register');

    Route::post('/store', [SupervisorController::class,'store'])->name('supervisorPanel.store');

    Route::get('/editSupervisor/{id}',[SupervisorController::class,'editSupervisor'])->name('supervisorPanel.editSupervisor');

    Route::post('/updateSupervisor/{id}',[SupervisorController::class,'updateSupervisor'])->name('supervisorPanel.updateSupervisor');

    Route::get('/deleteSupervisor/{id}',[SupervisorController::class,'deleteSupervisor'])->name('supervisorPanel.deleteSupervisor');

    Route::get('/boardMemberList',[SupervisorController::class,'boardMemberList'])->name('supervisorPanel.boardMemberList');

    Route::get('/addBoardMember/{id}',[SupervisorController::class,'addBoardMember'])->name('supervisorPanel.addBoardMember');

    Route::get('/remove/{id}',[SupervisorController::class,'remove'])->name('supervisorPanel.remove');
 
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

    Route::get('/remove/{id}',[StudentController::class,'remove'])->name('student.remove');

    Route::get('/removeB/{id}',[StudentController::class,'removeB'])->name('student.removeB');

    Route::get('/removeR/{id}',[StudentController::class,'removeR'])->name('student.removeR');

    Route::get('/allowedForBoard',[StudentController::class,'allowedForBoard'])->name('student.allowedForBoard');

    Route::get('/assignedForReportReview',[StudentController::class,'assignedForReportReview'])->name('student.assignedForReportReview');

    Route::get('/addToBoard/{id}',[StudentController::class,'addToBoard'])->name('student.addToBoard');

    Route::post('/storeToBoard/{id}',[StudentController::class,'storeToBoard'])->name('student.storeToBoard');

    Route::get('/addReportReviewer/{id}',[StudentController::class,'addReportReviewer'])->name('student.addReportReviewer');

    Route::post('/storeReportReviewer/{id}',[StudentController::class,'storeReportReviewer'])->name('student.storeReportReviewer');

    Route::get('/marks/{id}',[StudentController::class,'marks'])->name('student.marks');
    Route::get('/marksB/{id}',[StudentController::class,'marksB'])->name('student.marksB');
    Route::get('/marksR/{id}',[StudentController::class,'marksR'])->name('student.marksR');

    Route::post('/storeMarks/{id}',[StudentController::class,'storeMarks'])->name('student.storeMarks');
    Route::post('/storeMarksB/{id}',[StudentController::class,'storeMarksB'])->name('student.storeMarksB');
    Route::post('/storeMarksR/{id}',[StudentController::class,'storeMarksR'])->name('student.storeMarksR');

});


// Route::get('/dashboard', function () {
//     return view('frontend.layouts.dashboard');
// })->name('dashboard');

Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
// Route::get('/dashboard', [DashboardController::class,'dashData'])->name('dashboard');

require __DIR__.'/auth.php';




