<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationAPIMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);
Route::get('/logout', [UserController::class, 'userLogout']);
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);

Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationAPIMiddleware::class]);

Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationAPIMiddleware::class]);

Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationAPIMiddleware::class]);


//Category

Route::post("/create-category",[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::get("/list-category",[CategoryController::class,'CategoryList'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::post("/category-by-id",[CategoryController::class,'CategoryByID'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::post("/update-category",[CategoryController::class,'CategoryUpdate'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::post("/delete-category",[CategoryController::class,'CategoryDelete'])->middleware([TokenVerificationAPIMiddleware::class]);

Route::post("/create-customer",[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationAPIMiddleware::class]);




Route::post("/create-category",[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationAPIMiddleware::class]);



Route::post("/create-product",[ProductController::class,'CreateProduct'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::get("/list-product",[ProductController::class,'ProductList'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::post("/product-by-id",[ProductController::class,'ProductByID'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::post("/delete-product",[ProductController::class,'DeleteProduct'])->middleware([TokenVerificationAPIMiddleware::class]);
Route::post("/update-product",[ProductController::class,'UpdateProduct'])->middleware([TokenVerificationAPIMiddleware::class]);