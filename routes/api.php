<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Route khusus untuk DataTables AJAX
Route::get('/mahasiswa/all', [MahasiswaController::class, 'getAll']);

// Route untuk semua operasi CRUD API (index, store, show, update, destroy)
Route::apiResource('/mahasiswa', MahasiswaController::class);
