<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/berita', [BeritaController::class, 'index']);

// Menampilkan semua berita (GET)
Route::get('beritas', [BeritaController::class, 'index']); 

// Menampilkan berita berdasarkan ID (GET)
Route::get('beritas/{id}', [BeritaController::class, 'show']);

// Menyimpan berita baru (POST)
Route::post('beritas', [BeritaController::class, 'store']);

// Memperbarui berita berdasarkan ID (PUT/PATCH)
Route::put('beritas/{id}', [BeritaController::class, 'update']);
// Atau bisa menggunakan PATCH jika hanya sebagian data yang diperbarui
Route::patch('beritas/{id}', [BeritaController::class, 'update']);

// Menghapus berita berdasarkan ID (DELETE)
Route::delete('beritas/{id}', [BeritaController::class, 'destroy']);

