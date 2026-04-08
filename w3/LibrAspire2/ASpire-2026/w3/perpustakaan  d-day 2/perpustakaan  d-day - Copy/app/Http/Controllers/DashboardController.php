<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        // Statistik untuk admin
        $totalBuku = Buku::count();
        $totalUser = User::where('role', '!=', 'admin')->count();
        $totalPeminjaman = Peminjaman::count();
        $bukuHabis = Buku::where('stok', 0)->count();
        
        // Data peminjaman terbaru
        $peminjamanTerbaru = Peminjaman::with(['user', 'buku'])
            ->orderBy('tanggal_pinjam', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBuku',
            'totalUser',
            'totalPeminjaman',
            'bukuHabis',
            'peminjamanTerbaru'
        ));
    }

    public function anggota()
    {
        // Statistik untuk anggota
        $userId = Auth::id();
        $bukuDipinjam = Peminjaman::where('user_id', $userId)
            ->where('status', 'Dipinjam')
            ->count();
        
        $riwayat = Peminjaman::where('user_id', $userId)
            ->with('buku')
            ->orderBy('tanggal_pinjam', 'desc')
            ->take(5)
            ->get();

        return view('anggota.dashboard', compact('bukuDipinjam', 'riwayat'));
    }
}
