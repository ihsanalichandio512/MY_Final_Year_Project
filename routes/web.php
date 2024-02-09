<?php

use App\Models\users;
use App\Models\resetPassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\addroleController;
use App\Http\Controllers\addBatchcontroller;
use App\Http\Controllers\facuiltyController;
use App\Http\Controllers\userHomeController;
use App\Http\Controllers\addcoursecontroller;
use App\Http\Controllers\adddegreeController;
use App\Http\Controllers\addsubjectController;
use App\Http\Controllers\signupUserController;
use App\Http\Controllers\adddepartmentController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\Auth\passwordResetController;
use App\Http\Controllers\facuiltyControllerToSHow;
use App\Http\Controllers\studentController;
use App\Http\Middleware\CheckRole;
use Faker\Guesser\Name;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

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




// routes/web.php
Route::get('/users/pages/home',[userHomeController::class,'index'])->name('users.home.page');
Route::get('/login/page', [loginController::class, 'index'])->name('login.page');
Route::get('api/login', [loginController::class, 'login'])->name('login.api');
Route::get('/user/signup', [signupUserController::class, 'index'])->name('user.signup.view');
Route::post('/user/signup/data',[signupUserController::class,'store'])->name('user.signup.add');
Route::post('/check/login', [loginController::class, 'store'])->name('check.login');
Route::get('/admin',[adminController::class,'index'])->name('admin.home');
Route::get('/users/forgot',[forgotPasswordController::class,'index'])->name('forgot.password');
Route::post('/users/forgot',[forgotPasswordController::class,'forgotpassword'])->name('forgot.password.post');
Route::get('/users/resetPassword/{token}',[forgotPasswordController::class,'resetPassword'])->name('reset.password');
Route::post('/users/resetpassword',[forgotPasswordController::class,'resetPasswordpost'])->name('reset.password.post');
Route::get('/admin/showsubject',[addsubjectController::class,'showsubject'])->name('show.subject');
Route::get('/admin/addsubject',[addsubjectController::class,'addubject'])->name('add.subject');
Route::get('/admin/showbatch',[addbatchController::class,'showBatch'])->name('showbatch');
Route::get('/admin/addbatch',[addbatchController::class,'addBatch'])->name('addbatch');
Route::get('/admin/showdepartment',[adddepartmentController::class,'showdepartment'])->name('showdepartment');
Route::get('/admin/adddepartment',[adddepartmentController::class,'adddepartment'])->name('adddepartment');
Route::get('/admin/showrole',[addroleController::class,'showrole'])->name('showrole');
Route::get('/admin/addrole',[addroleController::class,'addrole'])->name('addrole');
Route::get('/admin/showdegree',[adddegreeController::class,'showdegree'])->name('showdegree');
Route::get('/admin/adddegree',[adddegreeController::class,'adddegree'])->name('adddegree');
Route::get('/admin/showfaclity',[facuiltyController::class,'showfaclity'])->name('showfaclity');
Route::post('/admin/addfacuilty',[facuiltyController::class,'addfacuilty'])->name('addfacuilty');

Route::get('/logout',[LogoutController::class,'destroy'])->name('logout');


Route::get('/show/faculity/home',[facuiltyControllerToSHow::class,'showFaculityPage'])->name('showFaculityPage');


// In routes/web.php
Route::get('/show/attendance/page', [attendanceController::class, 'showAttendencePage'])->name('showAttendencePage');
Route::get('/get/student/data', [attendanceController::class, 'getstudentdata'])->name('getstudentdata');
