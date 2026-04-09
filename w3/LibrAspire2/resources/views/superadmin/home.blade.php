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
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none; /* nonaktifkan underline link */
        color: inherit; /* gunakan warna teks normal */
    }

    .card:hover {
        transform: scale(1.1); /* membesar */
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        z-index: 10; /* agar hover terlihat di atas */
    }

    .card img {
        width: 100%;
        border-radius: 8px;
    }

    .card h4, .card small, .btn {
        display: block;
        margin: 5px 0;
        text-decoration: none; /* pastikan teks tidak seperti link */
        color: inherit; /* warna tetap normal */
    }

    .btn {
        background: #1b2a4e;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 12px;
        margin-top: 5px;
        display: inline-block;
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
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">LibrAspire</div>

    <input type="text" class="search" placeholder="Insert Book Title">

    <div class="nav-links">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('superadmin.user.index') }}">Users</a>
        <a href="{{ route('superadmin.profile') }}">Profile</a>        
    </div>
</div>

<h2>Popular Now 🔥</h2>
<div class="books">
    @forelse ($bukuPopular ?? [] as $buku)
        <a class="card" href="{{ route('superadmin.buku.detail', $buku->id) }}">
            @php
                $coverUrl = asset('images/default.jpg'); // default

                if($buku->cover) {
                    $coverUrl = asset('storage/' . $buku->cover); // covers/... termasuk upload & seeder
                }
            @endphp

            <img src="{{ $coverUrl }}" alt="{{ $buku->judul }}">

            <h4>{{ $buku->judul }}</h4>
            <small>{{ $buku->pengarang ?? '-' }}</small><br>
            <small>{{ $buku->tahun_terbit ?? '-' }}</small><br>

            <span class="btn">
                {{ $buku->total_pinjam ?? 0 }}x dipinjam
            </span>
        </a>
    @empty
        <p>Tidak ada buku populer minggu ini.</p>
    @endforelse
</div>

<h2>Our Latest Collection 📚</h2>
<div class="books">
    @forelse ($latestBooks ?? [] as $item)
     <a class="card" href="{{ route('superadmin.buku.detail', $buku->id) }}">
        @php
            $coverUrl = asset('images/default.jpg'); 
            if($item->cover) {
                $coverUrl = asset('storage/' . $item->cover); 
            }
        @endphp

        <img src="{{ $coverUrl }}" alt="{{ $item->judul }}">
        <h4>{{ $item->judul }}</h4>
        <small>{{ $item->pengarang ?? '-' }}</small><br>
        <small>{{ $item->tahun_terbit ?? '-' }}</small><br>

        <span class="btn">Stock: {{ $item->stock ?? 0 }}</span>
        </a>
@empty
    <p>Tidak ada buku terbaru.</p>
@endforelse
</div>


<!-- FOOTER -->
<div class="footer">
    <p>© 2025 LibrAspire. All rights reserved.</p>
    <p>Email | Twitter | Facebook | Instagram</p>
    <p>Jl Raya ITS, Surabaya, Indonesia</p>
</div>

</body>
</html>