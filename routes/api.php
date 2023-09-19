<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Auth Routes
Route::post("sign-up",[UserController::class,"CreateUser"]);
Route::post("sign-in",[UserController::class,"LoginUser"]);


// Category Routes
Route::get("get-category",[CategoryController::class,"getCategory"]);
Route::post("create-category",[CategoryController::class,"createCategory"]);
Route::post("delete-category",[CategoryController::class,"deleteCategory"]);


// Brand Routes
Route::get("get-brand",[BrandController::class,"getBrand"]);
Route::post("create-brand",[BrandController::class,"createBrand"]);
Route::post("delete-brand",[BrandController::class,"deleteBrand"]);


// Product Route
Route::get("get-product",[ProductController::class,"getProduct"]);
Route::get("id-get-product/{id}",[ProductController::class,"productById"]);
Route::post("create-product",[ProductController::class,"createProduct"]);
Route::post("delete-product",[ProductController::class,"deleteProduct"]);
