<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', [StudentController::class,'index'])
    ->middleware('auth:sanctum');

Route::post('/students', [StudentController::class,'store'])
    ->middleware('auth:sanctum');

Route::put('/students/{id}', [StudentController::class,'update'])
    ->middleware('auth:sanctum');

Route::delete('/students/{id}', [StudentController::class,'destroy'])
    ->middleware('auth:sanctum');

Route::get('/students/{id}', [StudentController::class,'show'])
    ->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


