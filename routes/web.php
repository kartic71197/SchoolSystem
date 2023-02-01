<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\joinedCoursesController;
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

//For Log Data
Route::get('/log',function(){ 
    Log::info('Log Data');
   
});

//For View Page
Route::get('/', function () {
    return view('welcomePage');
});

//For Creating Courses by Admin and will route the view/showallcourses  
Route::resource('course',courseController::class);
Route::resource('joinedcourses',joinedCoursesController::class);
Route::get('/login',[CustomAuthController::class,'login']);
Route::get('/registration',[CustomAuthController::class,'registration']);
Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[CustomAuthController::class,'dashboard']);
Route::get('/logout',[CustomAuthController::class,'logout']);
Route::get('/adminlogin',[AdminController::class,'adminlogin']);
Route::post('/admin-login',[AdminController::class,'adminlogindata'])->name('admin-login');
Route::get('/admindashboard',[AdminController::class,'admindashboard']);
Route::get('delete/{id}',[AdminController::class,'delete']);
Route::get('/showstudents',[AdminController::class,'showstudents']);
Route::get('/adminlogout',[AdminController::class,'adminlogout']);