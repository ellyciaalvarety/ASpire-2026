<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
        return view('landingpage');
    }
        $user = Auth::user();

        $popular = Buku::leftJoin('peminjaman', 'buku.id', '=', 'peminjaman.buku_id')
            ->where('peminjaman.tanggal_pinjam', '>=', Carbon::now()->subDays(7))
            ->select('buku.*', DB::raw('COUNT(peminjaman.id) as total_pinjam'))
            ->groupBy('buku.id')
            ->orderByDesc('total_pinjam')
            ->take(5)
            ->get();

        $latest = Buku::orderBy('created_at', 'desc')->take(12)->get();

        if ($user->role == 'member') {
            return view('member.home', compact('popular','latest'));
        }

        if ($user->role == 'admin') {
            return view('admin.home');
        }

        if ($user->role == 'superadmin') {
            return view('superadmin.home');
        }

        return redirect('/login');
    }
    use App\Models\Kategori;

    public function home()
    {
        $kategori = Kategori::withCount('buku')->get();

        return view('superadmin.home', compact('kategori'));
    }
}