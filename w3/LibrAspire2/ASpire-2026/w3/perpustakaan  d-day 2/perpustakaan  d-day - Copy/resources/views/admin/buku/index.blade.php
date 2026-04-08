<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Kelola Buku - Admin</title>
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
        .table-wrapper { margin: 2rem auto; max-width: 1100px; }
        .top-actions { display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem; gap:1rem; }
        .search-input { padding:8px 12px; border:1px solid #e0e0e0; border-radius:8px; }
        table.book-table { width:100%; border-collapse:collapse; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 6px 18px rgba(0,0,0,0.06); }
        table.book-table thead th { background:#f3f6fb; padding:12px 16px; text-align:left; border-bottom:1px solid #67a6f2ff; }
        table.book-table tbody td { padding:12px 16px; border-bottom:1px solid #8eaac5ff; }
        .actions a, .actions button { margin-right:6px; }
        .small-muted { color:#6b7280; font-size:0.9rem; }
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
    <div class="table-wrapper">
        <div class="top-actions">
            <h1>Daftar Buku</h1>
            <div style="display:flex; gap:8px; align-items:center;">
                <input placeholder="Cari judul atau pengarang..." class="search-input" id="bookSearch" />
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
                @endif
            </div>
        </div>

        <table class="book-table" id="booksTable">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    @if(Auth::user() && Auth::user()->role == 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($data as $buku)
                <tr>
                    <td>
                        <div style="font-weight:600">{{ $buku->judul }}</div>
                        <div class="small-muted">ISBN: {{ $buku->isbn ?? '-' }}</div>
                    </td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>{{ $buku->stok }}</td>
                    @if(Auth::user() && Auth::user()->role == 'admin')
                        <td class="actions">
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-wrapper" style="margin-top:1.5rem;">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="text-decoration:none; padding:0.5rem 1rem;">← Kembali ke Dashboard</a>
    </div>

    <script>
        (function(){
            const input = document.getElementById('bookSearch');
            const table = document.getElementById('booksTable');
            if(!input || !table) return;
            input.addEventListener('input', function(){
                const q = this.value.toLowerCase();
                Array.from(table.tBodies[0].rows).forEach(row=>{
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.indexOf(q) === -1 ? 'none' : '';
                });
            });
        })();
    </script>
</body>
</html>