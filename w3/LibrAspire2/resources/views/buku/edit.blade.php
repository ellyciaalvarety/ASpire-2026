@extends('layouts.app')

@section('title', 'Edit Buku')
@section('page-title', '✏️ Edit Buku')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <i class="fas fa-edit text-warning"></i> Form Edit Buku
    </div>
    <div class="card-body">
        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Judul Buku <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>ISBN <span class="text-danger">*</span></label>
                    <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $buku->isbn) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Pengarang</label>
                    <input type="text" name="pengarang" class="form-control" value="{{ old('pengarang', $buku->pengarang) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $buku->stok) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ $buku->kategori_id == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label>Sinopsis</label>
                    <textarea name="sinopsis" class="form-control" rows="3">{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label>Cover Saat Ini</label>
                    @if($buku->cover)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $buku->cover) }}" width="100">
                        </div>
                    @endif
                    <input type="file" name="cover" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endsection