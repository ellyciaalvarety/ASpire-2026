<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
               * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }
        
        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar h2 {
            font-size: 1.5rem;
        }
        
        .navbar-right {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .navbar-right a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        
        .navbar-right a:hover {
            background-color: #34495e;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .welcome {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .welcome h1 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
            border-left: 5px solid #3498db;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #2c3e50;
            margin: 0.5rem 0;
        }
        
        .stat-label {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        
        .section {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .section h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
            border-bottom: 2px solid #3498db;
            padding-bottom: 0.5rem;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        table th {
            background-color: #ecf0f1;
            padding: 0.75rem;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #bdc3c7;
        }
        
        table td {
            padding: 0.75rem;
            border-bottom: 1px solid #ecf0f1;
        }
        
        table tbody tr:hover {
            background-color: #f9f9f9;
        }
        
        .menu-links {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }
        
        .menu-links a {
            padding: 0.75rem 1.5rem;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .menu-links a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>📚 Perpustakaan Admin</h2>
        <div class="navbar-right">
            <span>{{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}">Logout</a>
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
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">← Kembali</a>
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
