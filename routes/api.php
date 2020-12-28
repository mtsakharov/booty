<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::get('/getAllUsers', [\App\Http\Controllers\InformationController::class, 'getAllUsersWithActiveWork']);
    Route::get('/information/list/', [\App\Http\Controllers\InformationController::class, 'index']);
    Route::post('/information/store', [\App\Http\Controllers\InformationController::class, 'store']);
    Route::get('/information/show/{id}', [\App\Http\Controllers\InformationController::class, 'show']);
    Route::post('/information/update/{id}', [\App\Http\Controllers\InformationController::class, 'update']);
    Route::post('/information/delete/{id}', [\App\Http\Controllers\InformationController::class, 'destroy']);
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
