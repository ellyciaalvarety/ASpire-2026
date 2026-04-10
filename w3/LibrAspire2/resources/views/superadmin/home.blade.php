<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LibrAspire - Superadmin Home</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #eff3f8;
            color: #10214b;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 50px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo {
            font-weight: 700;
            font-size: 24px;
            letter-spacing: -0.04em;
            color: #0f234d;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-links a {
            text-decoration: none;
            color: #4f5870;
            font-weight: 600;
            transition: color .2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #0f234d;
        }

        .search {
            padding: 12px 18px;
            border-radius: 999px;
            border: 1px solid #d6dbe8;
            width: 280px;
            outline: none;
            color: #10214b;
            font-size: 14px;
        }

        .section {
            max-width: 1180px;
            margin: 0 auto;
            padding: 30px 24px;
        }

        .section h2 {
            margin: 0 auto 18px;
            text-align: center;
            font-size: 32px;
            color: #10214b;
        }

        .books {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 22px;
            margin-bottom: 40px;
        }

        .card {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(17, 31, 63, 0.08);
            transition: transform .3s ease, box-shadow .3s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 26px 50px rgba(17, 31, 63, 0.12);
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .card-body {
            padding: 18px 16px 22px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .card-body h4 {
            margin: 0 0 8px;
            font-size: 16px;
            color: #0f234d;
            line-height: 1.35;
            min-height: calc(1.35em * 2);
            overflow-wrap: anywhere;
        }

        .card-body small {
            display: block;
            color: #67728b;
            margin-bottom: 0;
            font-size: 13px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 14px;
            background: #0f234d;
            color: #fff;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            margin-top: auto;
            align-self: flex-start;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(190px, 220px));
            gap: 18px;
            margin-bottom: 40px;
            justify-content: center;
        }

        .category {
            background: #0f234d;
            color: #fff;
            border-radius: 16px;
            padding: 18px 16px;
            text-align: center;
            min-height: 96px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .category h4 {
            margin: 0 0 6px;
            font-size: 15px;
            letter-spacing: 0.03em;
            line-height: 1.35;
            overflow-wrap: anywhere;
        }

        .category p {
            margin: 0;
            font-size: 13px;
            color: rgba(255,255,255,0.75);
        }

        .footer {
            background: #0f234d;
            color: #ffffff;
            text-align: center;
            padding: 34px 24px;
            margin-top: 20px;
        }

        .footer p {
            margin: 8px 0;
            color: rgba(255,255,255,0.8);
            font-size: 14px;
        }

        @media(max-width: 860px) {
            .navbar { flex-wrap: wrap; gap: 18px; padding: 22px 24px; }
            .search { width: 100%; max-width: 100%; }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="{{ route('superadmin.home') }}" class="logo">LibrAspire</a>

        <input type="text" class="search" placeholder="Insert Book Title">

        <div class="nav-links">
            <a href="{{ route('superadmin.home') }}">Home</a>
            <a href="{{ route('superadmin.user.index') }}">Users</a>
            <a href="{{ route('superadmin.profile') }}">Profile</a>
        </div>
    </div>

    <section class="section">
        <h2>Popular Now</h2>
        <div class="books">
            @forelse ($bukuPopular ?? [] as $buku)
                <a class="card" href="{{ route('superadmin.buku.detail', $buku->id) }}">
                    @php
                        if (!empty($buku->cover_url)) {
                            $coverUrl = $buku->cover_url;
                        } elseif (!empty($buku->cover)) {
                            $coverUrl = asset('storage/' . $buku->cover);
                        } else {
                            $coverUrl = asset('images/default.jpg');
                        }
                    @endphp

                    <img src="{{ $coverUrl }}" alt="{{ $buku->judul }}">
                    <div class="card-body">
                        <h4>{{ $buku->judul }}</h4>
                        <small>{{ $buku->pengarang ?? '-' }}</small>
                        <small>{{ $buku->tahun_terbit ?? '-' }}</small>
                        <span class="badge">{{ $buku->total_pinjam ?? 0 }}x dipinjam</span>
                    </div>
                </a>
            @empty
                <p>Tidak ada buku populer minggu ini.</p>
            @endforelse
        </div>
    </section>

    <section class="section">
        <h2>Book Categories</h2>
        <div class="categories">
            @foreach (['Technology','Self Improvement','Fiction','History','Business'] as $category)
                <div class="category">
                    <h4>{{ $category }}</h4>
                    <p>2500 Books</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section">
        <h2>Our Latest Collection</h2>
        <div class="books">
            @forelse ($latestBooks ?? [] as $item)
                <a class="card" href="{{ route('superadmin.buku.detail', $item->id) }}">
                    @php
                        if (!empty($item->cover_url)) {
                            $coverUrl = $item->cover_url;
                        } elseif (!empty($item->cover)) {
                            $coverUrl = asset('storage/' . $item->cover);
                        } else {
                            $coverUrl = asset('images/default.jpg');
                        }
                    @endphp

                    <img src="{{ $coverUrl }}" alt="{{ $item->judul }}">
                    <div class="card-body">
                        <h4>{{ $item->judul }}</h4>
                        <small>{{ $item->pengarang ?? '-' }}</small>
                        <small>{{ $item->tahun_terbit ?? '-' }}</small>
                        <span class="badge">Stock: {{ $item->stock ?? 0 }}</span>
                    </div>
                </a>
            @empty
                <p>Tidak ada buku terbaru.</p>
            @endforelse
        </div>
    </section>

    <footer class="footer">
        <p>© 2025 LibrAspire. All rights reserved.</p>
        <p>Email | Twitter | Facebook | Instagram</p>
        <p>Jl Raya ITS, Surabaya, Indonesia</p>
    </footer>

</body>
</html>