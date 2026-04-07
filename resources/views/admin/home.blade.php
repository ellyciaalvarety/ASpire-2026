@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', '🏠 Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Buku</h5>
                        <h2 class="mb-0">{{ $totalBuku ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-book fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Peminjaman</h5>
                        <h2 class="mb-0">{{ $totalPeminjaman ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-hand-holding fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Stok Habis</h5>
                        <h2 class="mb-0">{{ $stokHabis ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-exclamation-triangle fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <i class="fas fa-clock"></i> Peminjaman Terbaru
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjamanTerbaru ?? [] as $item)
                            <tr>
                                <td>{{ $item->user->name ?? '-' }}</td>
                                <td>{{ $item->buku->judul ?? '-' }}</td>
                                <td>{{ $item->tanggal_pinjam ?? $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $item->status ?? 'Dipinjam' }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada peminjaman</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <i class="fas fa-book"></i> Buku Terbaru
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bukuTerbaru ?? [] as $item)
                            <tr>
                                <td>{{ Str::limit($item->judul, 25) }}</td>
                                <td>{{ $item->pengarang }}</td>
                                <td>
                                    @if($item->stok > 0)
                                        <span class="badge bg-success">{{ $item->stok }}</span>
                                    @else
                                        <span class="badge bg-danger">0</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada buku</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <a href="{{ route('admin.buku.index') }}" class="btn btn-primary">
                    <i class="fas fa-book"></i> Kelola Buku
                </a>
                <a href="{{ route('admin.peminjaman.index') }}" class="btn btn-success">
                    <i class="fas fa-hand-holding"></i> Kelola Peminjaman
                </a>
                <a href="{{ route('profile.edit') }}" class="btn btn-info">
                    <i class="fas fa-user"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection