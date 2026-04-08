<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::middleware('auth')->group(function () {

   //==============   ALL ROLES ==========
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    

    // ================    ADMINNNN    ======================
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

        Route::resource('/buku', BukuController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/peminjaman', PeminjamanController::class);

        // Admin profile
        Route::get('/profil', [ProfileController::class, 'editAdmin'])->name('admin.profil.edit');
        Route::post('/profil', [ProfileController::class, 'updateAdmin'])->name('admin.profil.update');

    });

    // =================  ANGGOTA      ========================
    Route::middleware('anggota')->prefix('anggota')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'anggota'])->name('anggota.dashboard');
        
        Route::get('/buku', [BukuController::class, 'index'])->name('anggota.index');

        Route::get('/riwayat', [PeminjamanController::class, 'riwayatAnggota'])->name('anggota.riwayat');

        Route::post('/peminjaman', [PeminjamanController::class, 'storeAnggota'])->name('anggota.peminjaman.store');

        Route::get('/profil', [ProfileController::class, 'editAnggota'])->name('anggota.profil.edit');
        Route::post('/profil', [ProfileController::class, 'updateAnggota'])->name('anggota.profil.update');

    });


   // ================= All Roles =====================
    Route::get('/profil-saya', function () {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        if ($user->role === 'admin') {
            return redirect()->route('admin.profil.edit');
        }
        return redirect()->route('anggota.profil.edit');
    })->name('profil.edit');

    Route::post('/profil-saya', [ProfileController::class, 'update'])
        ->name('profil.update');

});
