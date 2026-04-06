<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    return view('landingpage');
});

// Login & Register
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);


/*
|--------------------------------------------------------------------------
| AUTH (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | REDIRECT OTOMATIS SESUAI ROLE
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect('/admin');
        }

        if ($user->role == 'member') {
            return redirect('/member');
        }

        if ($user->role == 'superadmin') {
            return redirect('/superadmin');
        }
    });


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin')->prefix('admin')->group(function () {

        Route::get('/', function () {
            return view('admin.home');
        });

        Route::get('/profil', function () {
            return view('admin.profile');
        });

        Route::get('/profil/edit', function () {
            return view('admin.editprofile');
        });

        // buku
        Route::get('/buku', [BukuController::class, 'index']);
        Route::get('/buku/create', [BukuController::class, 'create']);
        Route::post('/buku', [BukuController::class, 'store']);
        Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
        Route::put('/buku/{id}', [BukuController::class, 'update']);
        Route::delete('/buku/{id}', [BukuController::class, 'destroy']);

        // peminjaman
        Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    });


    /*
    |--------------------------------------------------------------------------
    | MEMBER
    |--------------------------------------------------------------------------
    */
    Route::middleware('member')->prefix('member')->group(function () {

        Route::get('/', function () {
            return view('member.home');
        });

        Route::get('/profil', function () {
            return view('member.profile');
        });

        Route::get('/profil/edit', function () {
            return view('member.editprofile');
        });

        Route::get('/contact', function () {
            return view('member.contactus');
        });

        Route::get('/buku', [BukuController::class, 'index']);
        Route::get('/buku/{id}', function () {
            return view('member.buku.detail');
        });

        Route::post('/pinjam/{id}', [PeminjamanController::class, 'store']);
    });


    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('superadmin')->prefix('superadmin')->group(function () {

        Route::get('/', function () {
            return view('superadmin.home');
        });

        Route::get('/profil', function () {
            return view('superadmin.profile');
        });

        Route::get('/profil/edit', function () {
            return view('superadmin.editprofile');
        });

        // manage user
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/{id}/edit', [UserController::class, 'edit']);
        Route::put('/user/{id}', [UserController::class, 'update']);
        Route::delete('/user/{id}', [UserController::class, 'destroy']);
    });

});