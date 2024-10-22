<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/animals',[AnimalController::class,'index']);
Route::post('/animals',[AnimalController::class,'store']);
Route::put('/animals',[AnimalController::class,'update']);
Route::delete('/animals',[AnimalController::class,'destroy']);
