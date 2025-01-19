<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// user

Route::post('/user-registration', [UserController::class, 'userRegistration'])->name('userRegistration');
Route::post('/user-login', [UserController::class, 'userLogin'])->name('userLogin');
Route::get('/logout', [UserController::class, 'userLogout'])->name('userLogout');
Route::post('/send-otp', [UserController::class, 'SendOTPCode'])->name('SendOTPCode');
Route::post('/verify-otp', [UserController::class, 'VerifyOTP'])->name('VerifyOTP');
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);

Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);

//Category
Route::post("/create-category",[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);