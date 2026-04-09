<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LibrAspire</title>
    <style>
        :root {
            --bg-soft: #eff3f8;
            --bg-card: #ffffff;
            --ink: #10214b;
            --ink-soft: #5a6582;
            --brand: #0f234d;
            --brand-2: #1d3772;
            --line: #d5dcea;
            --danger-bg: #ffe7ea;
            --danger-ink: #991b1b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            background: var(--bg-soft);
            color: var(--ink);
            display: flex;
            flex-direction: column;
        }

        .topbar {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 22px 50px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(15, 35, 77, 0.06);
        }

        .brand {
            text-decoration: none;
            color: var(--brand);
            font-weight: 700;
            font-size: 28px;
            letter-spacing: -0.03em;
        }

        .auth-wrap {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .auth-card {
            width: min(980px, 100%);
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-radius: 30px;
            overflow: hidden;
            background: var(--bg-card);
            box-shadow: 0 28px 65px rgba(15, 35, 77, 0.14);
        }

        .auth-form {
            padding: 46px 44px;
        }

        .auth-form h2 {
            margin: 0 0 8px;
            font-size: 34px;
            letter-spacing: -0.02em;
            color: var(--ink);
        }

        .auth-form .sub {
            margin: 0 0 24px;
            color: var(--ink-soft);
            font-size: 14px;
        }

        .alert {
            margin-bottom: 16px;
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 14px;
        }

        .alert-error {
            background: var(--danger-bg);
            color: var(--danger-ink);
            border: 1px solid #f8c6ce;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 14px;
        }

        .field label {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink-soft);
        }

        .field input {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #f9fbff;
            color: var(--ink);
            font-size: 14px;
            padding: 12px 15px;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .field input:focus {
            border-color: #90a3d8;
            box-shadow: 0 0 0 4px rgba(29, 55, 114, 0.1);
        }

        .btn-register {
            width: 100%;
            border: none;
            border-radius: 999px;
            padding: 13px 16px;
            background: var(--brand);
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
            margin-top: 6px;
        }

        .btn-register:hover {
            background: var(--brand-2);
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(15, 35, 77, 0.25);
        }

        .form-footer {
            margin-top: 18px;
            text-align: center;
            color: var(--ink-soft);
            font-size: 14px;
        }

        .form-footer a {
            color: var(--brand);
            font-weight: 600;
            text-decoration: none;
        }

        .auth-intro {
            padding: 52px 44px;
            background: linear-gradient(165deg, #0f234d 0%, #1d3772 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-intro h1 {
            margin: 0 0 12px;
            font-size: 40px;
            line-height: 1.05;
            letter-spacing: -0.03em;
        }

        .auth-intro p {
            margin: 0;
            color: rgba(255,255,255,0.82);
            line-height: 1.8;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .topbar {
                padding: 18px 22px;
            }

            .brand {
                font-size: 24px;
            }

            .auth-card {
                grid-template-columns: 1fr;
            }

            .auth-form,
            .auth-intro {
                padding: 34px 24px;
            }

            .auth-intro h1 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <a class="brand" href="{{ route('landingpage') }}">LibrAspire</a>
    </header>

    <main class="auth-wrap">
        <section class="auth-card">
            <div class="auth-form">
                <h2>Create Account</h2>
                <p class="sub">Daftar akun baru untuk mulai memakai LibrAspire.</p>

                @if($errors->any())
                    <div class="alert alert-error">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="field">
                        <label for="name">Nama</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Buat password" required>
                    </div>

                    <div class="field">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi password" required>
                    </div>

                    <button type="submit" class="btn-register">Register</button>
                </form>

                <div class="form-footer">
                    Sudah punya akun? <a href="{{ route('login') }}">Login sekarang</a>
                </div>
            </div>

            <div class="auth-intro">
                <h1>Join LibrAspire</h1>
                <p>
                    Buat akunmu dan nikmati pengalaman membaca yang lebih rapi,
                    mulai dari eksplorasi koleksi hingga manajemen peminjaman.
                </p>
            </div>
        </section>
    </main>
</body>
</html>