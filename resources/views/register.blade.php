<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

    <h2>Register</h2>

    <form action="/register" method="POST">
        @csrf

        <div>
            <label>Nama</label><br>
            <input type="text" name="name" required>
        </div>

        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" required>
        </div>

        <br>

        <div>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </div>

        <br>

        <div>
            <label>Konfirmasi Password</label><br>
            <input type="password" name="password_confirmation" required>
        </div>

        <br>

      
        <button type="submit">Register</button>
    </form>

    <br>

    <a href="/login">Sudah punya akun? Login</a>

</body>
</html>