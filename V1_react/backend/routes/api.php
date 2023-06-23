<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// protected routes
Route::group(['middleware' => ['auth:sanctum']] , function () {
    Route::delete('/destroy/{id}', [UserControler::class, 'destroy']);
    Route::put('/update/{id}', [UserControler::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

});


// public User routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/getusers', [UserControler::class, 'getUsers']);
Route::get('/getuser/{id}', [UserControler::class, 'getSpicificeUser']);
Route::get('/search/{id}', [UserControler::class, 'search']);


// Category routes
Route::post('/category/create', [CategoryController::class, 'create']);
Route::get('/category/findall', [CategoryController::class, 'index']);
Route::get('/category/findone/{id}', [CategoryController::class, 'show']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy']);


// Category routes
Route::post('/city/create', [CityController::class, 'create']);
Route::get('/city/findall', [CityController::class, 'index']);
Route::get('/city/findone/{id}', [CityController::class, 'show']);
Route::post('/city/update/{id}', [CityController::class, 'update']);
Route::get('/city/destroy/{id}', [CityController::class, 'destroy']);



// Category routes
Route::post('/post/create', [PostController::class, 'create']);
Route::get('/post/findall', [PostController::class, 'index']);
Route::get('/post/findone/{id}', [PostController::class, 'show']);
Route::post('/post/update/{id}', [PostController::class, 'update']);
Route::get('/post/destroy/{id}', [PostController::class, 'destroy']);
Route::get('/post/search/{title}', [PostController::class, 'search']);
Route::get('/post/filter', [PostController::class, 'filterData']);
Route::post('/post/validate/{id}', [PostController::class, 'validate']);
