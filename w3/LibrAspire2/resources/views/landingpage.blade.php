<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LibrAspire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Segoe+UI&display=swap" rel="stylesheet">

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
            padding: 20px 50px;
            font-size: 22px;
            font-weight: bold;
            color: #1e3a8a;
        }

        /* HERO */
        .hero {
            margin-top: 0px;
            min-height: 90vh;
            display: flex;
            justify-content: center;   /* tengah horizontal */
            align-items: center;       /* tengah vertikal */
            text-align: center;
            padding: 40px;
        }

        /* TEXT */
        .hero-text {
            max-width: 520px;
            z-index: 2;
        }

        .hero-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 56px;
            line-height: 1.2;
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 18px;
            color: #3b4a6b;
            margin-bottom: 30px;
        }

        /* BUTTON */
        .hero-buttons {
            display: flex;
            gap: 20px;
        }

        .btn {
            padding: 14px 40px;
            border-radius: 999px; /* pill */
            font-size: 15px;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }

        .btn-primary {
            background: #1e3a8a;
            color: white;
        }

        .btn-outline {
            border: 1.5px solid #1e3a8a;
            background: transparent;
            color: #1e3a8a;
        }

        .btn-primary:hover {
            background: #162d6b;
        }

        .btn-outline:hover {
            background: #1e3a8a;
            color: white;
        }

        /* IMAGE RIGHT */
        .hero-img {
            position: absolute;
            right: 20;
            top: 0;
            width: 55%; /* dari 45% → lebih besar */
            height: 100%;
            overflow: hidden;
        }



        /* HOW IT WORKS */
        .how-it-works {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 380px;
        }

        .how-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .how-content {
            background: #0d2243;
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .how-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            margin-bottom: 30px;
        }

        .steps {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .step {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .step-num {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
        }

        .step-text strong {
            display: block;
            font-size: 15px;
        }

        .step-text span {
            font-size: 13px;
            opacity: 0.8;
        }

        /* FOOTER */
        .footer {
            background: #0f2a5c;
            color: white;
            text-align: center;
            padding: 30px;
        }

        .footer p {
            font-size: 14px;
            margin: 5px 0;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 40px;
            }

            .hero-img img {
                transform: rotate(0);
            }

            .how-it-works {
                grid-template-columns: 1fr;
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
<section class="hero">
    <div class="hero-text">
        <h1>Find and <br> Borrow Books <br> Easily</h1>
        <p>Access thousands of books anytime, anywhere.</p>

        <div class="hero-buttons">
            <a href="/login">
                <button class="btn btn-primary">Log In</button>
            </a>

            <a href="/register">
                <button class="btn btn-outline">Register</button>
            </a>
        </div>
    </div>

</section>

<!-- HOW IT WORKS -->
<section class="how-it-works">
    <div class="how-img">
        <img src="https://github.com/ellyciaalvarety/ASpire-2026/raw/main/images/imgforhowitworks.png">
    </div>

    <div class="how-content">
        <h2>How It Works</h2>

        <div class="steps">
            <div class="step">
                <div class="step-num">1</div>
                <div class="step-text">
                    <strong>Register</strong>
                    <span>Create your account for free.</span>
                </div>
            </div>

            <div class="step">
                <div class="step-num">2</div>
                <div class="step-text">
                    <strong>Search Books</strong>
                    <span>Find the books you're looking for.</span>
                </div>
            </div>

            <div class="step">
                <div class="step-num">3</div>
                <div class="step-text">
                    <strong>Request a Loan</strong>
                    <span>Submit a borrowing request.</span>
                </div>
            </div>

            <div class="step">
                <div class="step-num">4</div>
                <div class="step-text">
                    <strong>Pick Up Your Book</strong>
                    <span>Collect your book at the library.</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<div class="footer">
    <p>© 2025 LibrAspire. All rights reserved.</p>
    <p>Email | Twitter | Facebook | Instagram</p>
    <p>Jl Raya ITS, Surabaya, Indonesia</p>
</div>

</body>
</html>