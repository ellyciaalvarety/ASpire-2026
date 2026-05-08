<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - {{ $buku->judul }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #041f3d 0%, #0f3f74 38%, #ffffff 100%);
            color: #102a44;
        }

        .page-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .book-detail {
            width: 100%;
            max-width: 1120px;
            border-radius: 36px;
            overflow: hidden;
            background: #fbfdff;
            box-shadow: 0 40px 120px rgba(15, 23, 42, 0.18);
            display: grid;
            grid-template-columns: minmax(300px, 420px) 1fr;
        }

        .book-detail__hero {
            background: linear-gradient(180deg, #0d3b68 0%, #27598f 100%);
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-detail__cover {
            width: 100%;
            max-width: 320px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 32px 70px rgba(8, 29, 63, 0.24);
            background: #ffffff;
        }

        .book-detail__cover img {
            width: 100%;
            height: auto;
        }

        .book-detail__content {
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .book-detail__title {
            font-size: clamp(2.5rem, 3vw, 3.75rem);
            font-weight: 800;
            margin-bottom: 16px;
        }

        .book-detail__subtitle {
            color: #475569;
            margin-bottom: 12px;
        }

        .book-detail__meta {
            color: #64748b;
            margin-bottom: 26px;
        }

        .book-detail__stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 32px;
        }

        .book-detail__stat {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 22px;
        }

        .book-detail__stat-title {
            font-size: 0.8rem;
            color: #64748b;
        }

        .book-detail__stat-value {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .book-detail__description {
            margin-bottom: 40px;
            white-space: pre-line;
        }

        .button-group {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .button-back, .button-edit, .button-delete {
            padding: 12px 24px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .button-back {
            border: 1px solid #000;
            color: #000;
        }

        .button-edit {
            background: #102a44;
            color: #fff;
        }

        .button-delete {
            border: 1px solid #dc2626;
            color: #dc2626;
            background: #fff;
        }

        .button-delete:hover {
            background: #dc2626;
            color: #fff;
        }

        .page-footer {
            text-align: center;
            margin-top: 20px;
            color: #ccc;
        }
    </style>
</head>

<body>

<div class="page-shell">
    <section class="book-detail">

        <!-- COVER -->
        <div class="book-detail__hero">
            <div class="book-detail__cover">
                <img src="{{ $buku->cover_url ?? 'https://via.placeholder.com/420x610?text=No+Cover' }}">
            </div>
        </div>

        <!-- CONTENT -->
        <div class="book-detail__content">

            <div>
                <h1 class="book-detail__title">{{ $buku->judul }}</h1>
                <p class="book-detail__subtitle">
                    {{ $buku->pengarang }} | {{ $buku->tahun_terbit }}
                </p>
                <p class="book-detail__meta">
                    {{ $buku->kategori->nama ?? 'Tanpa kategori' }}
                </p>

                <div class="book-detail__stats">
                    <div class="book-detail__stat">
                        <div class="book-detail__stat-title">ISBN</div>
                        <div class="book-detail__stat-value">{{ $buku->isbn }}</div>
                    </div>

                    <div class="book-detail__stat">
                        <div class="book-detail__stat-title">Stock</div>
                        <div class="book-detail__stat-value">{{ $buku->stock ?? 0 }}</div>
                    </div>
                </div>

                <div class="book-detail__description">
                    {{ $buku->sinopsis ?? 'Sinopsis belum tersedia.' }}
                </div>
            </div>

            <!-- BUTTON -->
            <div class="button-group">

                <!-- BACK -->
                <a href="{{ url()->previous() }}" class="button-back">
                    <i class="fas fa-arrow-left"></i> Back
                </a>

                <!-- EDIT -->
                <a href="{{ route('admin.buku.edit', $buku->id) }}" class="button-edit">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <!-- DELETE -->
                <form action="{{ route('admin.buku.destroy', $buku->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="button-delete">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>

            </div>

        </div>

    </section>
</div>

<div class="page-footer">
    <p>© 2025 LibrAspire</p>
</div>

</body>
</html>