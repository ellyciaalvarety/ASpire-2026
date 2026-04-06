<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

// landing page
Route::get('/', function () {
    return view('landingpage');
});

// auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


/*
|--------------------------------------------------------------------------
| DASHBOARD (SETELAH LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');


/*
|--------------------------------------------------------------------------
| AUTH (SEMUA USER LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // profile
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile', [UserController::class, 'update']);

    // buku (lihat semua)
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/{id}', [BukuController::class, 'show']);
});


/*
|--------------------------------------------------------------------------
| MEMBER (PINJAM BUKU)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:member'])->group(function () {

    Route::post('/pinjam/{id}', [PeminjamanController::class, 'store']);
});


/*
|--------------------------------------------------------------------------
| ADMIN (KELOLA BUKU & PEMINJAMAN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    // CRUD buku
    Route::get('/buku/create', [BukuController::class, 'create']);
    Route::post('/buku', [BukuController::class, 'store']);
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
    Route::put('/buku/{id}', [BukuController::class, 'update']);
    Route::delete('/buku/{id}', [BukuController::class, 'destroy']);

    // peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::post('/peminjaman/{id}/{status}', [PeminjamanController::class, 'updateStatus']);
});


/*
|--------------------------------------------------------------------------
| SUPERADMIN (MANAGE USER)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:superadmin'])->prefix('admin')->group(function () {

    Route::get('/user', [UserController::class, 'index']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});