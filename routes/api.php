<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('register', [authController::class, 'register']);
//     Route::get('login', [authController::class, 'login']);
//     Route::get('logout', [authController::class, 'logout']);
// });

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('register', [authController::class, 'register'])->name('register');
//     Route::get('login', [authController::class, 'login'])->name('login');
//     Route::get('logout', [authController::class, 'logout'])->name('logout');
// });
// Route::middleware('auth:sanctum')->get('/users', function (Request $request) {

//     return $request->users();
// });

Route::get('register', [authController::class, 'register']);
Route::get('login', [authController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [authController::class, 'logout']);
});

// Route::get('register', [authController::class, 'register'])->name('register');
// Route::get('login', [authController::class, 'login'])->name('login');
// Route::get('logout', [authController::class, 'logout'])->name('logout');
