<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/news/search/{title}', [NewsController::class, 'search']);

Route::get('/news/category/{category}', [NewsController::class, 'getByCategory']);

Route::get('/beritas', [BeritaController::class, 'index']); 

Route::get('/beritas/{id}', [BeritaController::class, 'show']);

Route::post('/beritas', [BeritaController::class, 'store']);

Route::put('/beritas/{id}', [BeritaController::class, 'update']);

Route::delete('/beritas/{id}', [BeritaController::class, 'destroy']);

