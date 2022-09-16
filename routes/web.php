<?php

use App\Http\Controllers\AdministrationController;
use App\Models\Supervisor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SupervisorController;
use App\Models\Administration;
use App\Models\School;

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
Route::get('/',function (){
    return redirect()->route('login');
});
Route::middleware('director')->name('director.')->prefix('director')->group(function(){
    Route::name('school.')->prefix('school/')->group(function (){
        Route::get('/create/step/first',[SchoolController::class,'firstStepPage'])->name('firstpage');
        Route::post('first',[SchoolController::class,'firstStep'])->name('firstcreate');

        Route::middleware('firststep')->get('create/step/second',[SchoolController::class,'secondStepPage'])->name('secondpage');
        Route::post('second',[SchoolController::class,'secondStep'])->name('secondcreate');

        Route::middleware(['firststep','secondstep'])->get('create/step/third',[SchoolController::class,'thirdStepPage'])->name('thirdpage');
        Route::post('third',[SchoolController::class,'thirdStep'])->name('thirdcreate');
        Route::get('/create/step/four',[SchoolController::class,'fourStepPage'])->name('fourpage');

        Route::middleware('thirdstep')->post('/create/step/four',[SchoolController::class,'create'])->name('create');
    });


});

Route::middleware('office')->name('office.')->prefix('office/')->group(function(){
    Route::get('',[OfficeController::class,'main'])->name('main');
    Route::get('schools',[SchoolController::class,'allSchools'])->name('schools');
    Route::post('school/create',[SchoolController::class,'AssignToOffice'])->name('school.change');
    Route::post('supervisor',[SupervisorController::class,'store'])->name('supervisor.create');
    Route::get('supervisor',[SupervisorController::class,'create'])->name('supervisor.create.page');
    Route::post('logout',[OfficeController::class,'logout'])->name('logout');

});


Route::middleware('admin')->name('admin.')->prefix('admin/')->group(function(){
    Route::get('offices',[OfficeController::class,'alloffices'])->name('offices');
    Route::get('office/{id}',[OfficeController::class,'OneOffice'])->name('office.show');
    Route::get('supervisors',[AdministrationController::class,'allsupervisors'])->name('supervisors');
    Route::post('supervisors/change',[SupervisorController::class,'AssignSuperVisorTo'])->name('supervisors.change');
    Route::get('direction/show/{id}',[AdministrationController::class,'showdirection'])->name('direction.details');
    Route::get('school/show/{id}',[SchoolController::class,'show'])->name('school.show');
    Route::post('school/change/{id}',[SchoolController::class,'changeStatus'])->name('school.change');
    Route::post('school/trasfer/{id}',[SchoolController::class,'AssignSchoolToOffice'])->name('school.trasfer');
    Route::post('logout',[AdministrationController::class,'logout'])->name('logout');


});


// auth Routes
Route::middleware('guest:admin,director,office')->group(function (){
    Route::get('/signup',[AuthController::class,'signupPage'])->name('signuppage');
    Route::get('/login',[AuthController::class,'loginPage'])->name('loginpage');
});


Route::post('/signup',[AuthController::class,'signup'])->name('signup');
Route::post('/login',[AuthController::class,'login'])->name('login');
