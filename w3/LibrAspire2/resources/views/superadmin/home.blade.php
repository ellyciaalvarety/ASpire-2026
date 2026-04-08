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

<!-- POPULAR -->
<h2>Popular Now</h2>
<div class="books">
    @for ($i = 0; $i < 5; $i++)
    <div class="card">
        <img src="{{ asset('images/default.jpg') }}">
        <h4>Dear Debbie</h4>
        <small>Freida McFadden</small><br>
        <small>2016</small><br>
        <span class="btn">Stock: 4</span>
    </div>
    @endfor
</div>

<!-- CATEGORY -->
<h2>Book Categories</h2>
<div class="categories">
    @for ($i = 0; $i < 5; $i++)
    <div class="category">
        <strong>Technology</strong><br><br>
        2500 Books
    </div>
    @endfor
</div>

<!-- LATEST -->
<h2>Our Latest Collection</h2>
<div class="books">
    @foreach ($latestBooks as $item)
    <div class="card">
        <img src="{{ $item->cover ? asset('storage/' . $item->cover) : asset('images/default.jpg') }}">
        
        <h4>{{ $item->judul }}</h4>
        <small>{{ $item->pengarang }}</small><br>
        <small>{{ $item->tahun_terbit }}</small><br>
        
        <span class="btn">Stock: {{ $item->stock }}</span>
    </div>
    @endforeach
</div>

<!-- FOOTER -->
<div class="footer">
    <p>© 2025 LibrAspire. All rights reserved.</p>
    <p>Email | Twitter | Facebook | Instagram</p>
    <p>Jl Raya ITS, Surabaya, Indonesia</p>
</div>

</body>
</html>