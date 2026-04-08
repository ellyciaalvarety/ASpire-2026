<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LibrAspire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f5f6fa;
        }

        /* NAVBAR */
        .navbar {
            padding: 20px 60px;
            font-weight: bold;
            font-size: 20px;
            color: #1e3a8a;
        }

        /* HERO */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 60px;
        }

        .hero-text {
            max-width: 500px;
        }

        .hero-text h1 {
            font-size: 48px;
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 18px;
            color: #555;
            margin-bottom: 25px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            font-size: 16px;
        }

        .btn-primary {
            background: #1e3a8a;
            color: white;
        }

        .btn-outline {
            border: 2px solid #1e3a8a;
            background: transparent;
            color: #1e3a8a;
        }

        .hero-img img {
            width: 350px;
            border-radius: 20px;
        }

        /* SECTION */
        .section {
            display: flex;
            margin-top: 50px;
        }

        .section img {
            width: 50%;
            object-fit: cover;
        }

        .how {
            width: 50%;
            background: #0f2a5c;
            color: white;
            padding: 50px;
        }

        .how h2 {
            margin-bottom: 30px;
        }

        .step {
            margin-bottom: 20px;
        }

        .step span {
            font-weight: bold;
            margin-right: 10px;
        }

        /* FOOTER */
        .footer {
            background: #0f2a5c;
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: 50px;
        }

        .footer p {
            margin: 5px 0;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .section {
                flex-direction: column;
            }

            .section img,
            .how {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    LibrAspire
</div>

<!-- HERO -->
<div class="hero">
    <div class="hero-text">
        <h1>Find and <br> Borrow Books Easily</h1>
        <p>Access thousands of books anytime, anywhere.</p>

        <a href="/login">
            <button class="btn btn-primary">Log In</button>
        </a>

        <a href="/register">
            <button class="btn btn-outline">Register</button>
        </a>
    </div>

    <div class="hero-img">
        <!-- GANTI DENGAN GAMBAR KAMU -->
        <img src="<?php echo e(asset('images/hero.jpg')); ?>" alt="Books">
    </div>
</div>

<!-- SECTION -->
<div class="section">
    <img src="<?php echo e(asset('images/library.jpg')); ?>" alt="Library">

    <div class="how">
        <h2>How It Works</h2>

        <div class="step">
            <span>1.</span> Register <br>
            <small>Create your account for free.</small>
        </div>

        <div class="step">
            <span>2.</span> Search Books <br>
            <small>Find the books you're looking for.</small>
        </div>

        <div class="step">
            <span>3.</span> Request a Loan <br>
            <small>Submit a borrowing request.</small>
        </div>

        <div class="step">
            <span>4.</span> Pick Up Your Book <br>
            <small>Collect your book at the library.</small>
        </div>
    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    <p>© 2025 LibrAspire. All rights reserved.</p>
    <p>Email | Twitter | Facebook | Instagram</p>
    <p>Jl Raya ITS, Surabaya, Indonesia</p>
</div>

</body>
</html><?php /**PATH C:\Users\Lenovo\Downloads\kuliah pens\FILE TUGAS\Rincian Tugas\ASpire\ASpire-2026-main\ASpire-2026-main\w3\LibrAspire2\resources\views/landingpage.blade.php ENDPATH**/ ?>