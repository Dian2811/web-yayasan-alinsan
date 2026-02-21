<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;

// 1. FITUR ADMIN (Wajib Login & Ditaruh di Atas agar tidak bentrok dengan slug)
Route::middleware('auth')->group(function () {
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store'); // Ubah ke /store agar beda
    Route::get('/berita/{slug}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{slug}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{slug}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Manajemen User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
});

// 2. HALAMAN PUBLIK (Bisa diakses siapa saja)
Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita', [BeritaController::class, 'index']); // Agar alamat /berita juga bisa dibuka
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// 3. FITUR LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');