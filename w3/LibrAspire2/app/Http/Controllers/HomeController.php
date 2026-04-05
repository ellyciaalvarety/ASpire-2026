<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Popular (1 minggu terakhir)
        $popular = Buku::select('buku.*', DB::raw('COUNT(peminjaman.id) as total_pinjam'))
            ->leftJoin('peminjaman', 'buku.id', '=', 'peminjaman.buku_id')
            ->where('peminjaman.tanggal_pinjam', '>=', now()->subDays(7))
            ->groupBy('buku.id')
            ->orderByDesc('total_pinjam')
            ->take(5)
            ->get();

        // Latest Collection
        $latest = Buku::latest()->take(12)->get();

        return view('home', compact('popular', 'latest'));
    }
}