
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - LibrAspire</title>
    <style>
        body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
            background: #edf2f8;
            color: #151a33;
        }
        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .page-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .card-form {
            width: 100%;
            max-width: 980px;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 28px 70px rgba(15, 33, 71, 0.12);
            display: flex;
            background: white;
        }
        .panel-left {
            width: 320px;
            background: linear-gradient(180deg, #0f2147 0%, #22316f 100%);
            padding: 48px 32px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .panel-left h1 {
            margin: 0;
            font-size: 26px;
            letter-spacing: -0.04em;
        }
        .panel-left p {
            margin-top: 18px;
            font-size: 14px;
            line-height: 1.8;
            color: rgba(255,255,255,0.78);
        }
        .form-area {
            flex: 1;
            padding: 48px 42px;
        }
        .form-area h2 {
            margin-top: 0;
            font-size: 32px;
            font-weight: 800;
            color: #151a33;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 24px;
            margin-top: 28px;
        }
        .form-grid input,
        .form-grid textarea {
            width: 100%;
            border: 1px solid #dce0e8;
            border-radius: 14px;
            padding: 16px 18px;
            font-size: 14px;
            color: #151a33;
            background: #fafbff;
        }
        .form-grid textarea {
            resize: vertical;
            min-height: 140px;
            grid-column: span 2;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #151a33;
        }
        .button-row {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin-top: 28px;
        }
        .btn-secondary,
        .btn-primary {
            border-radius: 999px;
            border: none;
            padding: 14px 34px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn-secondary {
            background: white;
            color: #151a33;
            border: 1px solid #151a33;
        }
        .btn-primary {
            background: #0f2147;
            color: white;
        }
        .footer {
            margin-top: auto;
            background: #0f2147;
            color: white;
            text-align: center;
            padding: 24px 20px;
            font-size: 14px;
        }
        @media (max-width: 900px) {
            .card-form { flex-direction: column; }
            .panel-left, .form-area { width: 100%; }
            .form-grid { grid-template-columns: 1fr; }
            .form-grid textarea { grid-column: auto; }
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card-form">
                <div class="panel-left">
                    <h1>LibrAspire</h1>
                    <p>Edit detail buku di halaman ini, lalu simpan untuk memperbarui koleksi admin.</p>
                </div>
                <div class="form-area">
                    <h2>Edit Book</h2>
                    <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-grid">
                            <div>
                                <label for="judul">Tittle</label>
                                <input id="judul" type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required>
                            </div>
                            <div>
                                <label for="tahun_terbit">Year</label>
                                <input id="tahun_terbit" type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                            </div>
                            <div>
                                <label for="cover">Photo</label>
                                <input id="cover" type="file" name="cover" accept="image/*">
                            </div>
                            <div>
                                <label for="pengarang">Author</label>
                                <input id="pengarang" type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required>
                            </div>
                            <div>
                                <label for="penerbit">Publisher</label>
                                <input id="penerbit" type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
                            </div>
                            <div>
                                <label for="isbn">NISBN</label>
                                <input id="isbn" type="text" name="isbn" value="{{ old('isbn', $buku->isbn) }}" required>
                            </div>
                            <div style="grid-column: span 2;">
                                <label for="sinopsis">Synopsis</label>
                                <textarea id="sinopsis" name="sinopsis">{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                            </div>
                        </div>
                        <div class="button-row">
                            <a href="{{ route('admin.buku.index') }}" class="btn-secondary">Cancel</a>
                            <button type="submit" class="btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>© 2025 LibrAspire. All rights reserved.</p>
            <p>Email | Twitter | Facebook | Instagram</p>
            <p>Jl Raya ITS, Surabaya, Indonesia</p>
        </div>
    </div>
</body>
</html>
