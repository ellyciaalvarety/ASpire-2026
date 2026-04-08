<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
class BukuController extends Controller
{
    //Tampilkan buku
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('buku.index', compact('buku'));
    }

    // Form tambah buku
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
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
            'category_id' => 'required',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $coverPath = null;

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Buku::create([
            'judul' => $request->judul,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'category_id' => $request->category_id,
            'sinopsis' => $request->sinopsis,
            'cover' => $coverPath,
            'stock' => $request->stock
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
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
            'category_id' => 'required',
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
            'category_id' => $request->category_id,
            'sinopsis' => $request->sinopsis,
            'stock' => $request->stock
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
        $latestBooks = Buku::latest()->take(12)->get();

        return view('welcome', compact('latestBooks'));
    }
}
