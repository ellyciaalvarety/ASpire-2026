<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - LibrAspire</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #0b1a41 0%, #132d61 52%, #0d1a33 100%);
            color: #ffffff;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 26px 50px;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
        }

        .logo {
            font-weight: 700;
            font-size: 24px;
            color: #ffffff;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-links a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-weight: 600;
            transition: color .25s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #ffffff;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 104px);
            padding: 0 24px;
        }

        .contact-card {
            width: min(760px, 100%);
            background: rgba(7, 20, 54, 0.95);
            border-radius: 32px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.35);
            padding: 48px;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .contact-card h1 {
            margin: 0 0 28px;
            font-size: 32px;
            letter-spacing: -0.03em;
            text-align: center;
            color: #ffffff;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 24px;
        }

        .field label {
            font-size: 14px;
            color: rgba(255,255,255,0.8);
            font-weight: 600;
        }

        .field input,
        .field textarea {
            width: 100%;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.18);
            background: rgba(255,255,255,0.06);
            color: #ffffff;
            padding: 18px 20px;
            font-size: 15px;
            outline: none;
            resize: vertical;
        }

        .field input::placeholder,
        .field textarea::placeholder {
            color: rgba(255,255,255,0.55);
        }

        .field textarea {
            min-height: 160px;
        }

        .btn-send {
            display: block;
            width: 160px;
            margin: 0 auto;
            background: #ffffff;
            color: #0b1a41;
            border: none;
            border-radius: 999px;
            padding: 16px 0;
            font-weight: 700;
            letter-spacing: 0.02em;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(0,0,0,0.18);
        }

        @media(max-width: 720px) {
            .navbar { flex-direction: column; gap: 16px; padding: 22px 18px; }
            .contact-card { padding: 32px 22px; }
            .btn-send { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">LibrAspire</div>
        <div class="nav-links">
            <a href="{{ route('member.home') }}">Home</a>
            <a href="{{ route('member.contact') }}" class="active">Contact</a>
            <a href="{{ route('member.profile') }}">Profile</a>
        </div>
    </div>
    <div class="content">
        <div class="contact-card">
            <h1>Contact Us</h1>
            <div>
                <div class="field">
                    <label for="subject">Subject</label>
                    <input id="subject" type="text" name="subject" placeholder="Enter your subject">
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Write your message"></textarea>
                </div>
                <button type="button" class="btn-send">Send</button>
            </div>
        </div>
    </div>
</body>
</html>