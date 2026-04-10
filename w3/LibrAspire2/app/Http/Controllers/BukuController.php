<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
class BukuController extends Controller
{
    //Tampilkan buku
    public function index()
    {
        $buku = Buku::with('kategori')->get();
       $latestBooks = $this->latest();
$bukuPopular = $this->popular();

return view('admin.home', compact('latestBooks', 'bukuPopular'));
    }

    // Form tambah buku
    public function create()
    {
        
        $kategori = Kategori::all();
        return view('admin.buku.create', compact('kategori'));
    }

    // Simpan data buku
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required|unique:buku',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori_id' => 'required',
            'stock' => 'nullable|integer|min:0',
           'cover' => 'nullable|file|mimes:jpg,jpeg,png|max:2048'  
                 ]);

        $coverPath = null;

        if ($request->hasFile('cover')) {
        $file = $request->file('cover');

        // optional cek manual
        if (!in_array($file->extension(), ['jpg', 'jpeg', 'png'])) {
            return back()->withErrors(['cover' => 'Format harus JPG/PNG']);
        }

        $coverPath = $file->store('covers', 'public');
    }

        Buku::create([
            'judul' => $request->judul,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'sinopsis' => $request->sinopsis,
            'cover' => $coverPath,
            'stock' => $request->stock ?? 0
        ]);

        return redirect()->route('admin.home')->with('success', 'Buku berhasil ditambahkan');
    }

    // Detail buku
    public function show($id)
    {
        $buku = Buku::with('kategori')->findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    // Form edit
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();

        return view('buku.edit', compact('buku', 'kategori'));
    }

    // Update data buku
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isbn' => 'required|unique:buku,isbn,' . $id,
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori_id' => 'required',
            'stock' => 'nullable|integer|min:0',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('cover')) {
            // hapus cover lama
            if ($buku->cover && file_exists(public_path('storage/' . $buku->cover))) {
                unlink(public_path('storage/' . $buku->cover));
            }

            $coverPath = $request->file('cover')->store('covers', 'public');
            $buku->cover = $coverPath;
        }

        $buku->update([
            'judul' => $request->judul,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id' => $request->kategori_id,
            'sinopsis' => $request->sinopsis,
            'stock' => $request->stock ?? $buku->stock
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate');
    }

    // Hapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->cover && file_exists(public_path('storage/' . $buku->cover))) {
            unlink(public_path('storage/' . $buku->cover));
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }

    // Latest Collection
    public function latest()
{
    return Buku::latest()->get();
}

    //popular
 public function popular()
{
    $oneWeekAgo = Carbon::now()->subDays(7);

    return DB::table('peminjaman')
->join('buku', 'peminjaman.buku_id', '=', 'buku.id')        ->select('buku.*', DB::raw('COUNT(peminjaman.id) as total_pinjam'))
        ->where('peminjaman.created_at', '>=', $oneWeekAgo)
        ->groupBy('buku.id')
        ->orderByDesc('total_pinjam')
        ->limit(5)
        ->get();
}
}
