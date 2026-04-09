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

Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);


/*
|--------------------------------------------------------------------------
| AUTH (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role == 'admin') return redirect('/admin');
        if ($user->role == 'member') return redirect('/member');
        if ($user->role == 'superadmin') return redirect('/superadmin');
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | USER PROFILE (SEMUA ROLE)
    |--------------------------------------------------------------------------
    */
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin')->prefix('admin')->group(function () {

        

        Route::get('/', function () {
            $controller = app(\App\Http\Controllers\BukuController::class);

            $latestBooks = $controller->latest();
            $bukuPopular = $controller->popular();

            return view('admin.home', compact('latestBooks', 'bukuPopular'));
        })->name('admin.home');

        // Buku Admin
        Route::get('/buku', [BukuController::class, 'index'])->name('admin.buku.index');
        Route::get('/buku/create', [BukuController::class, 'create'])->name('admin.buku.create');
        Route::post('/buku', [BukuController::class, 'store'])->name('admin.buku.store');
        Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('admin.buku.edit');
        Route::put('/buku/{id}', [BukuController::class, 'update'])->name('admin.buku.update');
        Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('admin.buku.destroy');

        // Peminjaman Admin
        Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
        Route::put('/peminjaman/{id}/status', [PeminjamanController::class, 'updateStatus'])
            ->name('admin.peminjaman.updateStatus');

        Route::get('/profile', function () {
            return view('admin.profile');
        })->name('admin.profile');

        Route::get('/profile/edit', function () {
            return view('admin.editprofile', ['user' => Auth::user()]);
        })->name('admin.editprofile');
    });


    /*
    |--------------------------------------------------------------------------
    | MEMBER
    |--------------------------------------------------------------------------
    */
    Route::middleware('member')->prefix('member')->group(function () {

        Route::get('/', function () {
            $controller = app(\App\Http\Controllers\BukuController::class);

            $latestBooks = $controller->latest();
            $bukuPopular = $controller->popular();

            return view('member.home', compact('latestBooks', 'bukuPopular'));
        })->name('member.home');

        Route::get('/contact', function () {
            return view('member.contactus');
        })->name('member.contact');

        // Buku Member
        Route::get('/buku', [BukuController::class, 'index'])->name('member.buku.index');
        Route::get('/buku/{id}', function () {
            return view('member.buku.detail');
        })->name('member.buku.detail');

        Route::post('/pinjam/{id}', [PeminjamanController::class, 'store'])->name('member.pinjam');
        
        Route::get('/profile', function () {
            return view('member.profile');
        })->name('member.profile');

        Route::get('/profile/edit', function () {
            return view('member.editprofile', ['user' => Auth::user()]);
        })->name('member.editprofile');
    });


    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('superadmin')->prefix('superadmin')->group(function () {

        Route::get('/', function () {
            $controller = app(\App\Http\Controllers\BukuController::class);

            $latestBooks = $controller->latest();
            $bukuPopular = $controller->popular();

            return view('superadmin.home', compact('latestBooks', 'bukuPopular'));
        })->name('superadmin.home');

        // MANAGE USER
        Route::get('/user', [UserController::class, 'index'])->name('superadmin.user.index');

        // update role 
        Route::put('/user/{id}/role', [UserController::class, 'updateRole'])->name('superadmin.user.updateRole');

        // delete user
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('superadmin.user.destroy');

        Route::get('/profile', function () {
            return view('superadmin.profile');
        })->name('superadmin.profile');

        Route::get('/profile/edit', function () {
            return view('superadmin.editprofile', ['user' => Auth::user()]);
        })->name('superadmin.editprofile');


    });

});