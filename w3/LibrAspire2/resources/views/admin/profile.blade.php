<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - LibrAspire</title>
    <style>
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
        body { margin: 0; font-family: Arial, sans-serif; background: #f5f6f8; background-image: radial-gradient(#d1d1d1 0.5px, transparent 0.5px); background-size: 20px 20px; }
        .navbar { display: flex; justify-content: space-between; padding: 20px 50px; align-items: center; }
        .logo { font-weight: bold; font-size: 22px; color: #1b2a4e; text-decoration: none; }
        .nav-links a { margin-left: 30px; text-decoration: none; color: #666; }
        .nav-links a.active { color: #1b2a4e; font-weight: bold; }

        .container { display: flex; justify-content: center; align-items: center; min-height: 70vh; }
        .profile-card {
            background: #1b2a4e; width: 850px; border-radius: 30px; padding: 50px;
            display: flex; align-items: center; color: white; position: relative;
        }
        .profile-img { width: 200px; height: 200px; border-radius: 50%; object-fit: cover; margin-right: 60px; border: 3px solid rgba(255,255,255,0.3); }
        .profile-info { flex: 1; }
        .info-row { display: flex; justify-content: space-between; margin-bottom: 25px; font-size: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px; }
        .info-label { font-weight: bold; }
        
        .logout-btn { color: #ff4d4d; text-decoration: none; font-weight: bold; font-size: 18px; display: inline-block; margin-top: 10px; }
        .btn-edit { position: absolute; bottom: 40px; right: 50px; background: white; color: #1b2a4e; padding: 10px 60px; border-radius: 25px; text-decoration: none; font-weight: bold; transition: 0.3s; }
        .btn-edit:hover { background: #e0e0e0; }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="{{ route('admin.home') }}" class="logo">LibrAspire</a>
        <div class="nav-links">
            <a href="{{ route('admin.home') }}">Home</a>
            <a href="{{ route('admin.peminjaman.index') }}">Request</a>
            <a href="#" class="active">Profile</a>
        </div>
    </div>

    <div class="container">
        <div class="profile-card">
            <img class="profile-img" src="{{ Auth::user()->foto_url }}">            
            <div class="profile-info">
                <div class="info-row">
                    <span class="info-label">Name</span>
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Password</span>
                    <span>*******</span>
                </div>
                <a href="{{ route('logout') }}" class="logout-btn">Log Out</a>
            </div>

            <a href="{{ route('admin.editprofile') }}" class="btn-edit">Edit</a>
        </div>
    </div>
    <footer class="footer">
        <p>© 2025 LibrAspire. All rights reserved.</p>
        <p>Email | Twitter | Facebook | Instagram</p>
        <p>Jl Raya ITS, Surabaya, Indonesia</p>
    </footer>
</body>
</html>