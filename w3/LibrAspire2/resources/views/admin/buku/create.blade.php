<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book - LibrAspire</title>
    <style>
        html, body {
            min-height: 100%;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #eceef1;
            color: #1f2937;
        }

        .page {
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            min-height: 0;
        }

        .sidebar {
            width: 215px;
            background: linear-gradient(180deg, #12307c 0%, #1f4bb7 100%);
            padding: 26px 30px;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            font-size: 38px;
            font-weight: 700;
            letter-spacing: -0.04em;
            display: inline-block;
            line-height: 1;
        }

        .content {
            flex: 1;
            background: #eceef1;
            padding: 34px 28px 30px;
            display: flex;
            justify-content: center;
        }

        .panel {
            width: min(860px, 100%);
        }

        .title {
            margin: 0 0 28px;
            text-align: center;
            font-size: 56px;
            color: #102b67;
            letter-spacing: -0.02em;
            font-weight: 700;
        }

        .alert-error {
            margin: 0 auto 18px;
            width: min(620px, 100%);
            border-radius: 12px;
            border: 1px solid #fecaca;
            background: #fee2e2;
            color: #991b1b;
            padding: 10px 14px;
            font-size: 14px;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 18px;
        }

        .form-box {
            width: min(620px, 100%);
            margin: 0 auto;
        }

        .form-group {
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 16px;
            align-items: center;
            margin-bottom: 12px;
        }

        .form-group label {
            font-size: 20px;
            font-weight: 700;
            color: #3f474f;
            line-height: 1.2;
            white-space: nowrap;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            border: none;
            background: #d5d5d7;
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 16px;
            color: #111827;
            outline: none;
            box-sizing: border-box;
            min-height: 46px;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 8px 10px;
            color: #374151;
        }

        input[type="file"]::file-selector-button {
            border: none;
            background: #c7c7ca;
            color: #1f2937;
            border-radius: 8px;
            padding: 6px 10px;
            margin-right: 10px;
            cursor: pointer;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 24px;
        }

        .btn {
            min-width: 160px;
            text-align: center;
            border-radius: 999px;
            padding: 12px 26px;
            font-size: 20px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: opacity .2s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-cancel {
            background: #f2f3f5;
            border: 2px solid #152f72;
            color: #152f72;
        }

        .btn-add {
            border: 2px solid #0f2865;
            background: #0f2865;
            color: #ffffff;
        }

        .btn-add:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .footer {
            background: #132a64;
            color: #ffffff;
            text-align: center;
            padding: 18px 24px 16px;
        }

        .footer::before {
            content: "";
            display: block;
            height: 1px;
            background: rgba(255,255,255,0.2);
            max-width: 95%;
            margin: 0 auto 10px;
        }

        .footer p {
            margin: 6px 0;
            font-size: 14px;
            opacity: 0.9;
        }

        @media (max-width: 900px) {
            .main-wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 16px 20px;
            }

            .sidebar a {
                font-size: 32px;
            }

            .title {
                font-size: 44px;
            }

            .form-group {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .form-group label {
                font-size: 18px;
            }

            .button-group {
                justify-content: stretch;
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @php
        $defaultKategoriId = old('kategori_id', optional($kategori->first())->id);
    @endphp

    <div class="page">
        <div class="main-wrapper">
            <div class="sidebar">
                <a href="{{ route('admin.home') }}">LibrAspire</a>
            </div>

            <div class="content">
                <div class="panel">
                    <h1 class="title">Add New Book</h1>

                    @if ($errors->any())
                        <div class="alert-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(!$defaultKategoriId)
                        <div class="alert-error">
                            <ul>
                                <li>Kategori belum tersedia. Tambahkan kategori terlebih dahulu.</li>
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data" class="form-box">
                        @csrf

                        @if($defaultKategoriId)
                            <input type="hidden" name="kategori_id" value="{{ $defaultKategoriId }}">
                        @endif
                        <input type="hidden" name="stock" value="{{ old('stock', 0) }}">

                        <div class="form-group">
                            <label for="judul">Tittle</label>
                            <input id="judul" type="text" name="judul" value="{{ old('judul') }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="pengarang">Author</label>
                            <input id="pengarang" type="text" name="pengarang" value="{{ old('pengarang') }}" required>
                        </div>


                        <div class="form-group">
                            <label for="tahun_terbit">Year</label>
                            <input id="tahun_terbit" type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="cover">Photo</label>
                            <input id="cover" type="file" name="cover" accept="image/*">
                        </div>


                        <div class="form-group">
                            <label for="penerbit">Publisher</label>
                            <input id="penerbit" type="text" name="penerbit" value="{{ old('penerbit') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input id="isbn" type="text" name="isbn" value="{{ old('isbn') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input id="stock" type="number" name="stock" min="0" value="{{ old('stock', 0) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="sinopsis">Synopsis</label>
                            <textarea id="sinopsis" name="sinopsis">{{ old('sinopsis') }}</textarea>
                        </div>

                        <div class="button-group">
                            <a href="{{ route('admin.home') }}" class="btn btn-cancel">Cancel</a>
                            <button type="submit" class="btn btn-add" @disabled(!$defaultKategoriId)>Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 LibrAspire. All rights reserved.</p>
            <p>Email  |  Twitter  |  Facebook  |  instagram</p>
            <p>Jl Raya ITS, Surabaya, Indonesia</p>
        </div>
    </div>
</body>
</html>
