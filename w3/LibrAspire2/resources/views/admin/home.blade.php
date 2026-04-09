<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LibrAspire</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f8;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
            color: #1b2a4e;
        }

        .nav-links a {
            margin-left: 30px;
            text-decoration: none;
            color: #333;
        }

        .search {
            padding: 8px 15px;
            border-radius: 20px;
            border: 1px solid #ccc;
            width: 250px;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        /* BOOK GRID */
        .books {
            display: flex;
            gap: 20px;
            padding: 20px 50px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 10px;
            width: 150px;
            text-align: center;
        }

        .card img {
            width: 100%;
            border-radius: 8px;
        }

        .card h4 {
            margin: 10px 0 5px;
        }

        .btn {
            background: #1b2a4e;
            color: white;
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 12px;
            display: inline-block;
            margin-top: 5px;
        }

        /* CATEGORY */
        .categories {
            display: flex;
            gap: 20px;
            padding: 20px 50px;
            justify-content: center;
        }

        .category {
            background: #1b2a4e;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 150px;
            text-align: center;
        }

        /* FOOTER */
        .footer {
            background: #1b2a4e;
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: 40px;
        }
         .floating-add {
            position: fixed;
            right: 32px;
            bottom: 32px;
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: #0f2147;
            color: white;
            font-size: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 18px 45px rgba(15, 33, 71, 0.25);
        }

    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">LibrAspire</div>

    <input type="text" class="search" placeholder="Insert Book Title">

    <div class="nav-links">
            <a href="{{ route('admin.home') }}" class="active">Home</a>
            <a href="{{ route('admin.peminjaman.index') }}">Request</a>
            <a href="{{ route('admin.profile') }}">Profile</a>        
    </div>
</div>

<h2>Popular Now 🔥</h2>
<div class="books">
    @forelse ($bukuPopular ?? [] as $buku)
        <div class="card">
            @php
                $coverUrl = $buku->cover_url ?? asset('images/default.jpg');
            @endphp

            <img src="{{ $coverUrl }}" alt="{{ $buku->judul }}">
            <h4>{{ $buku->judul }}</h4>
            <small>{{ $buku->pengarang ?? '-' }}</small><br>
            <small>{{ $buku->tahun_terbit ?? '-' }}</small><br>

            <span class="btn">
                {{ $buku->total_pinjam ?? 0 }}x dipinjam
            </span>
        </div>
    @empty
        <p>Tidak ada buku populer minggu ini.</p>
    @endforelse
</div>

<h2>Our Latest Collection 📚</h2>
<div class="books">
    @forelse ($latestBooks ?? [] as $item)
    <div class="card">
        @php
            $coverUrl = $item->cover_url ?? asset('images/default.jpg');
        @endphp

        <img src="{{ $coverUrl }}" alt="{{ $item->judul }}">
        <h4>{{ $item->judul }}</h4>
        <small>{{ $item->pengarang ?? '-' }}</small><br>
        <small>{{ $item->tahun_terbit ?? '-' }}</small><br>

        <span class="btn">Stock: {{ $item->stock ?? 0 }}</span>
    </div>
@empty
    <p>Tidak ada buku terbaru.</p>
@endforelse
</div>

<a href="{{ route('admin.buku.create') }}" class="floating-add" title="Add New Book">+</a>
<!-- FOOTER -->
<div class="footer">
    <p>© 2025 LibrAspire. All rights reserved.</p>
    <p>Email | Twitter | Facebook | Instagram</p>
    <p>Jl Raya ITS, Surabaya, Indonesia</p>
</div>

</body>
</html>