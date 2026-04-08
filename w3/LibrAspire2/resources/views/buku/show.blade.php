@extends('layouts.app')

@section('title', 'Detail Buku')
@section('page-title', '📄 Detail Buku')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <i class="fas fa-info-circle text-info"></i> Informasi Buku
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($buku->cover)
                    <img src="{{ asset('storage/' . $buku->cover) }}" class="img-fluid rounded" style="max-height: 200px;">
                @else
                    <div class="border p-5 text-muted">Tidak ada cover</div>
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-borderless">
                    <tr>
                        <th width="150">Judul Buku</th>
                        <td>: {{ $buku->judul }}</td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>: {{ $buku->isbn }}</td>
                    </tr>
                    <tr>
                        <th>Pengarang</th>
                        <td>: {{ $buku->pengarang }}</td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>: {{ $buku->penerbit }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: {{ $buku->tahun_terbit }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>: {{ $buku->stok }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: {{ $buku->kategori->nama_kategori ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Sinopsis</th>
                        <td>: {{ $buku->sinopsis ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection