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
            max-width: 1000px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(15, 33, 71, 0.12);
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
        }

        .panel-left h1 a {
            color: inherit;
            text-decoration: none;
        }

        .panel-left p {
            margin-top: 16px;
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.8;
        }

        .form-area {
            flex: 1;
            padding: 48px 40px;
        }

        .form-area h2 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 28px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 13px;
        }

        .form-grid input,
        .form-grid textarea,
        .form-grid select {
            width: 100%;
            border: 1px solid #dce0e8;
            border-radius: 12px;
            padding: 14px;
            font-size: 14px;
            background: #fafbff;
            transition: 0.2s;
        }

        .form-grid input:focus,
        .form-grid textarea:focus,
        .form-grid select:focus {
            outline: none;
            border-color: #0f2147;
            background: #fff;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            grid-column: span 2;
        }

        .cover-preview {
            margin-top: 10px;
        }

        .cover-preview img {
            width: 80px;
            border-radius: 8px;
        }

        .button-row {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-secondary,
        .btn-primary {
            border-radius: 999px;
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-secondary {
            background: white;
            border: 1px solid #151a33;
            color: #151a33;
        }

        .btn-secondary:hover {
            background: #151a33;
            color: white;
        }

        .btn-primary {
            background: #0f2147;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #1c2f6b;
        }

        .footer {
            background: #0f2147;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .card-form { flex-direction: column; }
            .panel-left { width: 100%; }
            .form-grid { grid-template-columns: 1fr; }
            textarea { grid-column: auto; }
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <div class="page-content">
        <div class="card-form">

            <!-- LEFT -->
            <div class="panel-left">
                <h1><a href="{{ route('admin.home') }}">LibrAspire</a></h1>
                <p>Edit data buku dengan mudah dan simpan perubahan.</p>
            </div>

            <!-- RIGHT -->
            <div class="form-area">
                <h2>Edit Book</h2>

                <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">

                        <div>
                            <label>Title</label>
                            <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required>
                        </div>

                        <div>
                            <label>Year</label>
                            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                        </div>

                        <div>
                            <label>Cover</label>
                            <input type="file" name="cover" accept="image/*">
                            @if($buku->cover)
                                <div class="cover-preview">
                                    <img src="{{ asset('storage/'.$buku->cover) }}">
                                </div>
                            @endif
                        </div>

                        <div>
                            <label>Author</label>
                            <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required>
                        </div>

                        <div>
                            <label>Publisher</label>
                            <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
                        </div>

                        <div>
                            <label>Stock</label>
                            <input type="number" name="stock" value="{{ old('stock', $buku->stock) }}" min="0">
                        </div>

                        <div>
                            <label>Category</label>
                            <select name="kategori_id">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" 
                                        {{ old('kategori_id', $buku->kategori_id) == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>ISBN</label>
                            <input type="text" name="isbn" value="{{ old('isbn', $buku->isbn) }}" required>
                        </div>

                        <div style="grid-column: span 2;">
                            <label>Synopsis</label>
                            <textarea name="sinopsis">{{ old('sinopsis', $buku->sinopsis) }}</textarea>
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
    </div>
</div>

</body>
</html>