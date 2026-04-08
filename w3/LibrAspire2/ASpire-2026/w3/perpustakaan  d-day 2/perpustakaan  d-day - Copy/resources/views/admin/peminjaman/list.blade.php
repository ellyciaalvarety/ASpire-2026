<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Peminjaman</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .navbar { background: #2c3e50; color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; }
        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        .section { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-group { display: flex; gap: 1rem; margin-bottom: 1.5rem; }
        .btn { padding: 0.75rem 1.5rem; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; }
        .btn-primary { background: #3498db; color: white; }
        .btn-primary:hover { background: #2980b9; }
        .btn-danger { background: #e74c3c; color: white; padding: 0.5rem 1rem; }
        .btn-edit { background: #f39c12; color: white; padding: 0.5rem 1rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        table th { background: #ecf0f1; padding: 1rem; text-align: left; border-bottom: 2px solid #bdc3c7; }
        table td { padding: 1rem; border-bottom: 1px solid #ecf0f1; }
        .action-cell { display: flex; gap: 0.5rem; }
        .success-message { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem; }
        .status-badge { padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: 500; }
        .status-dipinjam { background: #fff3cd; color: #856404; }
        .status-dikembalikan { background: #d4edda; color: #155724; }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>📚 Perpustakaan</h2>
        <div>
            <span>{{ Auth::user()->name }}</span> | <a href="{{ route('logout') }}" style="color: white;">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="section">
            <h1>📖 Kelola Peminjaman</h1>
            
            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif
            
            <div class="btn-group">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">+ Catat Peminjaman</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="background: #95a5a6;">← Kembali</a>
            </div>

            @if($peminjaman && $peminjaman->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $pinjam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pinjam->user->name ?? 'N/A' }}</td>
                            <td>{{ $pinjam->buku->judul ?? 'N/A' }}</td>
                            <td>{{ $pinjam->tanggal_pinjam ? $pinjam->tanggal_pinjam->format('d M Y') : '-' }}</td>
                            <td>{{ $pinjam->tanggal_kembali ? $pinjam->tanggal_kembali->format('d M Y') : '-' }}</td>
                            <td>
                                <span class="status-badge {{ $pinjam->status === 'Dikembalikan' ? 'status-dikembalikan' : 'status-dipinjam' }}">
                                    {{ $pinjam->status }}
                                </span>
                            </td>
                            <td>
                                <div class="action-cell">
                                    <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: center; color: #7f8c8d; padding: 2rem;">Belum ada data peminjaman</p>
            @endif
        </div>
    </div>
</body>
</html>
