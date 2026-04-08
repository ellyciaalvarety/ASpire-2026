
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tambah Buku - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: linear-gradient(180deg, #dde8f8ff 0%, #d1b8f6ff 100%);
            min-height: 100vh;
            padding: 2.5rem 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-wrapper { 
            max-width:800px; 
            margin:0 auto; 
            padding:1.5rem; 
            background:#ffffff;
            border-radius:8px; 
            box-shadow:0 6px 18px rgba(0, 0, 0, 0.06); 
        }
        .form-group { 
            margin-bottom:1rem; 
        }
        label { 
            display:block; margin-bottom:8px; font-weight:600; 
        }
        input[type="text"], input[type="number"] { 
            width:95%; 
            padding:10px 12px; 
            border:1px solid #6da9f3ff; 
            border-radius:8px;
        }
        .actions { 
            display:flex; gap:10px; margin-top:12px; 
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <h2>Tambah Buku</h2>

        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="judul" type="text" name="judul" value="{{ old('judul') }}" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input id="pengarang" type="text" name="pengarang" value="{{ old('pengarang') }}" required>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input id="penerbit" type="text" name="penerbit" value="{{ old('penerbit') }}" required>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input id="tahun_terbit" type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input id="stok" type="number" name="stok" value="{{ old('stok', 1) }}" required>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>