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
            display: block;
            width: 100%;
            height: auto;
        }
        .book-detail__content {
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .book-detail__header {
            max-width: 680px;
        }
        .book-detail__title {
            font-size: clamp(2.5rem, 3vw, 3.75rem);
            line-height: 1.02;
            margin-bottom: 16px;
            font-weight: 800;
            letter-spacing: -0.04em;
            color: #0f172a;
        }
        .book-detail__subtitle {
            color: #475569;
            font-size: 1rem;
            margin-bottom: 12px;
        }
        .book-detail__subtitle strong {
            color: #0f172a;
        }
        .book-detail__meta {
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 26px;
        }
        .book-detail__stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 32px;
        }
        .book-detail__stat {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 22px 24px;
        }
        .book-detail__stat-title {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #64748b;
            margin-bottom: 8px;
        }
        .book-detail__stat-value {
            font-size: 1.3rem;
            font-weight: 700;
            color: #0f172a;
        }
        .book-detail__description {
            color: #475569;
            line-height: 1.85;
            font-size: 1rem;
            max-width: 720px;
            margin-bottom: 40px;
            white-space: pre-line;
        }
        .button-group {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }
        .button-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: 999px;
            border: 1px solid #0f172a;
            color: #0f172a;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.2s ease;
            background: #ffffff;
        }
        .button-back:hover {
            background: #0f172a;
            color: #ffffff;
        }
        .page-footer {
            margin-top: 32px;
            text-align: center;
            color: #cbd5e1;
            font-size: 0.95rem;
        }
        .page-footer a {
            color: #cbd5e1;
            text-decoration: none;
            margin: 0 8px;
        }
        @media (max-width: 992px) {
            .book-detail {
                grid-template-columns: 1fr;
            }
            .book-detail__content {
                padding: 32px 28px;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <section class="book-detail">
            <div class="book-detail__hero">
                <div class="book-detail__cover">
                    <img src="{{ $buku->cover_url ?? 'https://via.placeholder.com/420x610?text=No+Cover' }}" alt="Cover {{ $buku->judul }}">
                </div>
            </div>
            <div class="book-detail__content">
                <div>
                    <div class="book-detail__header">
                        <h1 class="book-detail__title">{{ $buku->judul }}</h1>
                        <p class="book-detail__subtitle">{{ $buku->pengarang }} | <strong>{{ $buku->tahun_terbit }}</strong></p>
                        <p class="book-detail__meta">{{ $buku->kategori->nama ?? 'Tanpa kategori' }}</p>
                    </div>
                    <div class="book-detail__stats">
                        <div class="book-detail__stat">
                            <div class="book-detail__stat-title">ISBN</div>
                            <div class="book-detail__stat-value">{{ $buku->isbn }}</div>
                        </div>
                        <div class="book-detail__stat">
                            <div class="book-detail__stat-title">Tersedia</div>
                            <div class="book-detail__stat-value">{{ $buku->stock ?? 0 }} Left</div>
                        </div>
                    </div>
                    <div class="book-detail__description">
                        {{ $buku->sinopsis ?: 'Sinopsis belum tersedia.' }}
                    </div>
                </div>
                <div class="button-group">
                    <a href="{{ url()->previous() }}" class="button-back">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>

                
                        <form action="{{ route('member.pinjam', $buku->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="button-back" style="background:#0f3f74; color:white; border:none;">
                                <i class="fas fa-book"></i> Request
                            </button>
                        </form>
                </div>
            </div>
        </section>
    </div>
    <div class="page-footer">
        <p>© 2025 LibrAspire. All rights reserved. | Email | Twitter | Facebook | Instagram</p>
        <p>Jl Raya ITS, Surabaya, Indonesia</p>
    </div>
</body>
</html>
