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
use App\Http\Controllers\faclityController;
use App\Http\Controllers\facuiltyControllerToSHow;
use App\Http\Controllers\studentController;
use App\Http\Middleware\CheckRole;
use Faker\Guesser\Name;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;
use GuzzleHttp\Middleware;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::group(['middleware'=>['web','checkAdmin']],function(){
    Route::get('/admin',[adminController::class,'index'])->name('admin.home');
    Route::get('/admin/showsubject',[addsubjectController::class,'showsubject'])->name('show.subject');
    Route::get('/admin/addsubject',[addsubjectController::class,'addubject'])->name('addsubject');
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
    
});

// Route::group(['middleware' => ['web', 'checkFaculty']], function () {
//     Route::get('/show/faculty/page', [facuiltyController::class, 'showAttendancePage'])->name('showAttendancePage');
//     Route::post('/mark-attendance/submit', [facuiltyController::class, 'markAttendanceSubmit'])->name('mark-attendance-submit');
//     Route::get('/mark-attendance/get-degrees/{batchId}', [facuiltyController::class, 'getDegrees'])->name('mark-attendance.get-degrees');
//     Route::get('/mark-attendance/get-semesters/{degreeId}', [facuiltyController::class, 'getSemesters'])->name('mark-attendance.get-semesters');
//     Route::post('/mark-attendance/get-students', [facuiltyController::class, 'getStudents'])->name('mark-attendance.get-students');
// });


Route::group(['middleware'=>['web','checkFaclity']],function(){
    Route::get('/show/faclity/page',[faclityController::class,'showhome'])->name('showhome');
    Route::get('/show/attendance/page',[faclityController::class,'showAttendancePage'])->name('showAttendancePage');
   Route::post('/attendance/store', [faclityController::class, 'storeAttendance'])->name('attendance.store');
   Route::get('/attendance/fetch/semesters', [faclityController::class, 'fetchSemesters'])->name('attendance.fetch.semesters');
   Route::get('/attendance/fetch/batches', [faclityController::class, 'fetchBatches'])->name('attendance.fetch.batches');
Route::get('attendance.fetch.students', [faclityController::class, 'fetchStudents'])->name('attendance.fetch.students');

});

Route::group(['middleware',['web','checkStudent']],function(){

});

Route::group(['middleware'=>['web','checkUser']],function(){
    Route::get('/users/pages/home',[userHomeController::class,'index'])->name('users.home.page');
    Route::get('/user/signup', [signupUserController::class, 'index'])->name('user.signup.view');
    Route::post('/user/signup/data',[signupUserController::class,'store'])->name('user.signup.add');
    Route::get('/users/forgot',[forgotPasswordController::class,'index'])->name('forgot.password');
    Route::post('/users/forgot',[forgotPasswordController::class,'forgotpassword'])->name('forgot.password.post');
    Route::get('/users/resetPassword/{token}',[forgotPasswordController::class,'resetPassword'])->name('reset.password');
    Route::post('/users/resetpassword',[forgotPasswordController::class,'resetPasswordpost'])->name('reset.password.post');
    
});


Route::get('/', [loginController::class, 'index'])->name('login.page');
Route::post('/check/login', [loginController::class, 'store'])->name('check.login');
Route::get('/logout',[LogoutController::class,'destroy'])->name('logout');

// routes/web.php
// Route::get('api/login', [loginController::class, 'login'])->name('login.api');
// Route::get('/users/pages/home',[userHomeController::class,'index'])->name('users.home.page');
// Route::get('/user/signup', [signupUserController::class, 'index'])->name('user.signup.view');
// Route::post('/user/signup/data',[signupUserController::class,'store'])->name('user.signup.add');
// Route::get('/admin',[adminController::class,'index'])->name('admin.home');
// Route::get('/users/forgot',[forgotPasswordController::class,'index'])->name('forgot.password');
// Route::post('/users/forgot',[forgotPasswordController::class,'forgotpassword'])->name('forgot.password.post');
// Route::get('/users/resetPassword/{token}',[forgotPasswordController::class,'resetPassword'])->name('reset.password');
// Route::post('/users/resetpassword',[forgotPasswordController::class,'resetPasswordpost'])->name('reset.password.post');
// Route::get('/admin/showsubject',[addsubjectController::class,'showsubject'])->name('show.subject');
// Route::get('/admin/addsubject',[addsubjectController::class,'addubject'])->name('add.subject');
// Route::get('/admin/showbatch',[addbatchController::class,'showBatch'])->name('showbatch');
// Route::get('/admin/addbatch',[addbatchController::class,'addBatch'])->name('addbatch');
// Route::get('/admin/showdepartment',[adddepartmentController::class,'showdepartment'])->name('showdepartment');
// Route::get('/admin/adddepartment',[adddepartmentController::class,'adddepartment'])->name('adddepartment');
// Route::get('/admin/showrole',[addroleController::class,'showrole'])->name('showrole');
// Route::get('/admin/addrole',[addroleController::class,'addrole'])->name('addrole');
// Route::get('/admin/showdegree',[adddegreeController::class,'showdegree'])->name('showdegree');
// Route::get('/admin/adddegree',[adddegreeController::class,'adddegree'])->name('adddegree');
// Route::get('/admin/showfaclity',[facuiltyController::class,'showfaclity'])->name('showfaclity');
// Route::post('/admin/addfacuilty',[facuiltyController::class,'addfacuilty'])->name('addfacuilty');

// Route::get('/logout',[LogoutController::class,'destroy'])->name('logout');


// Route::get('/show/faculity/home',[facuiltyControllerToSHow::class,'showFaculityPage'])->name('showFaculityPage');


// // In routes/web.php
// Route::get('/show/attendance/page', [attendanceController::class, 'showAttendencePage'])->name('showAttendencePage');
// Route::get('/get/student/data', [attendanceController::class, 'getstudentdata'])->name('getstudentdata');


// Route::get('/show/attendance/page', [attendanceController::class, 'index'])->name('showAttendancePage');
// Route::get('/get-degrees', [attendanceController::class, 'getDegrees'])->name('getDegree');
// Route::get('/get-semesters', [attendanceController::class, 'getSemesters'])->name('getSemester');
// Route::get('/get-students', [attendanceController::class, 'getStudents'])->name('getStudents');