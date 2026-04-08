<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 1.5rem;
        }

        .navbar-right {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .navbar-right a, .logout-button {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            background-color: #3498db;
            border: none;
            cursor: pointer;
        }

        .navbar-right a:hover, .logout-button:hover {
            background-color: #2980b9;
        }

        .auth-container {
            max-width: 600px;
            background: white;
            margin: 3rem auto;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .auth-header h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #34495e;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 3px rgba(52, 152, 219, 0.5);
        }

        button[type="submit"] {
            padding: 0.75rem 1.5rem;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            font-size: 1rem;
        }

        button[type="submit"]:hover {
            background-color: #219150;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <h2>Perpustakaan</h2>
        </div>
        <div class="navbar-right">
            <a href="{{ route('anggota.dashboard') }}">Dashboard</a>
        </div>
    </div>

    <div class="auth-container">
        <div class="auth-header">
            <h2>Profil Anggota</h2>
        </div>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profil.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password baru (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>

</body>
</html>
