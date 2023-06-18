<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserControler;


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
