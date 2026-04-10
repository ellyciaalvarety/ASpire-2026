<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contact Us - LibrAspire</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #EEF2F7;
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 22px 50px;
    background: #ffffff;
    border-bottom: 1px solid #e5e7eb;
}

.logo {
    font-weight: 700;
    font-size: 22px;
    color: #1e3a8a;
    text-decoration: none;
}

.nav-links {
    display: flex;
    gap: 28px;
}

.nav-links a {
    color: #9ca3af;
    text-decoration: none;
    font-weight: 500;
}

.nav-links a.active {
    color: #1e3a8a;
    font-weight: 700;
}

/* CONTACT SECTION */
.contact-section {
    position: relative;
    min-height: calc(100vh - 80px);
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-bg {
    position: absolute;
    inset: 0;
}

.contact-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* CARD */
.contact-card {
    position: relative;
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    padding: 30px;
    width: 100%;
    max-width: 380px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.contact-card h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    color: #0b1a41;
}

/* INPUT */
.contact-card input,
.contact-card textarea {
    width: 100%;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    padding: 12px;
    margin-bottom: 12px;
    font-size: 14px;
}

.contact-card textarea {
    height: 100px;
}

/* BUTTON */
.send-btn {
    width: 100%;
    background: #1e3a8a;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 12px;
    font-weight: 600;
    cursor: pointer;
}

.send-btn:hover {
    background: #2563eb;
}

/* RESPONSIVE */
@media(max-width: 720px) {
    .navbar {
        flex-direction: column;
        gap: 12px;
        padding: 18px;
    }

    .contact-card {
        margin: 20px;
    }

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
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="#" class="logo">LibrAspire</a>
    <div class="nav-links">
        <a href="#">Home</a>
        <a href="#" class="active">Contact</a>
        <a href="#">Profile</a>
    </div>
</div>

<!-- CONTACT -->
<section class="contact-section">
    <div class="contact-bg">
        <img src="https://github.com/ellyciaalvarety/ASpire-2026/raw/main/images/imgforcontactus.png" alt="bg">
    </div>

    <div class="contact-card">
        <h2>Contact Us</h2>
        <input type="text" placeholder="Your Name">
        <input type="email" placeholder="Email">
        <textarea placeholder="Message"></textarea>
        <button class="send-btn">Send</button>
    </div>
</section>
<footer class="footer">
        <p>© 2025 LibrAspire. All rights reserved.</p>
        <p>Email | Twitter | Facebook | Instagram</p>
        <p>Jl Raya ITS, Surabaya, Indonesia</p>
    </footer>

</body>
</html>
```
