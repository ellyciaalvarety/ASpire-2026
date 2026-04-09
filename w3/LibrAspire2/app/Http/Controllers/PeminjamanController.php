<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Member pinjam buku
    public function store($buku_id)
    {
        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku_id,
            'tanggal_pinjam' => now(),
            'status' => 'waiting'
        ]);

        return back()->with('success', 'Berhasil mengajukan peminjaman');
    }

    // Admin lihat semua peminjaman
    public function index()
    {
        $data = Peminjaman::with('user','buku')->get();
        return view('admin.peminjaman.index', compact('data'));
    }

    // Update status (admin)
    public function updateStatus(Request $request, $id)
{
    $pinjam = Peminjaman::findOrFail($id);

    if ($request->status == 'approved') {
        $pinjam->tanggal_kembali = now()->addDays(7);
    }

    $pinjam->update([
        'status' => $request->status
    ]);

    return back();
}
}