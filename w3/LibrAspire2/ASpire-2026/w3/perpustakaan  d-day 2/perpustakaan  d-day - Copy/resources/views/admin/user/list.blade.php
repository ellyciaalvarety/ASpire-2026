<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota</title>
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
            <h1>📋 Kelola Anggota</h1>
            
            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif
            
            <div class="btn-group">
                <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="background: #95a5a6;">← Kembali</a>
            </div>

            @if($user && $user->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $anggota)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $anggota->name }}</td>
                            <td>{{ $anggota->email }}</td>
                            <td>{{ ucfirst($anggota->role) }}</td>
                            <td>{{ $anggota->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="action-cell">
                                    <a href="{{ route('user.edit', $anggota->id) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('user.destroy', $anggota->id) }}" method="POST" style="display:inline;">
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
                <p style="text-align: center; color: #7f8c8d; padding: 2rem;">Belum ada anggota terdaftar</p>
            @endif
        </div>
    </div>
</body>
</html>
