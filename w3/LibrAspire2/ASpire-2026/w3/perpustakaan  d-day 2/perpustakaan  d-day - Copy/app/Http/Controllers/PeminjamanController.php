<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Tampilkan semua data peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->get();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    // Form tambah peminjaman
    public function create()
    {
        // Ambil hanya user dengan role anggota
        $users = User::where('role', 'anggota')->get();
        
        // Ambil buku yang stoknya masih ada
        $bukus = Buku::where('stok', '>', 0)->get();

        return view('admin.peminjaman.create', compact('users', 'bukus'));
    }

    // Simpan peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:buku,id',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        // Cek stok buku
        if ($buku->stok < 1) {
            return back()->with('error', 'Stok buku habis');
        }

        // Cek apakah user sudah meminjam buku yang sama & belum dikembalikan
        $pinjamanAktif = Peminjaman::where('user_id', $request->user_id)
            ->where('buku_id', $request->buku_id)
            ->where('status', 'Dipinjam')
            ->exists();

        if ($pinjamanAktif) {
            return back()->with('error', 'User sudah meminjam buku ini dan belum dikembalikan!');
        }

        // Kurangi stok buku
        $buku->decrement('stok');

        // Simpan data peminjaman
        Peminjaman::create([
            'tanggal_pinjam' => Carbon::now()->toDateString(),
            'tanggal_kembali' => Carbon::now()->addDays(7)->toDateString(),
            'status' => 'Dipinjam',
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
        ]);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dicatat');
    }

    // Form edit peminjaman
    public function edit($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);
        return view('admin.peminjaman.edit', compact('peminjaman'));
    }

    // Update status peminjaman (dikembalikan / hilang / dipinjam)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Dipinjam,Dikembalikan,Hilang',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        if ($request->status === 'Dikembalikan' && $peminjaman->status === 'Dipinjam') {
            $peminjaman->tanggal_kembali = Carbon::now();

            // Tambahkan stok buku kembali ke library
            $buku = Buku::findOrFail($peminjaman->buku_id);
            $buku->increment('stok');
        }

        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman berhasil diperbarui');
    }

    // Hapus peminjaman
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status == 'Dipinjam') {
            // Kembalikan stok buku jika masih dipinjam saat dihapus
            $buku = Buku::findOrFail($peminjaman->buku_id);
            $buku->increment('stok');
        }

        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus');
    }

    // Simpan peminjaman dari anggota (user biasa)
    public function storeAnggota(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok < 1) {
            return back()->with('error', 'Stok buku habis');
        }

        $pinjamanAktif = Peminjaman::where('user_id', Auth::id())
            ->where('buku_id', $request->buku_id)
            ->where('status', 'Dipinjam')
            ->exists();

        if ($pinjamanAktif) {
            return back()->with('error', 'Anda masih meminjam buku ini!');
        }

        $buku->decrement('stok');

        Peminjaman::create([
            'tanggal_pinjam' => Carbon::now()->toDateString(),
            'tanggal_kembali' => Carbon::now()->addDays(7)->toDateString(),
            'status' => 'Dipinjam',
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
        ]);

        return redirect()->route('anggota.riwayat')->with('success', 'Berhasil meminjam buku');
    }

    // Riwayat peminjaman khusus anggota
    public function riwayatAnggota()
    {
        $userId = Auth::id();
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', $userId)
            ->orderBy('tanggal_pinjam', 'desc')
            ->get();

        return view('anggota.riwayat', compact('peminjaman'));
    }
}

