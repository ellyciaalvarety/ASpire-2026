<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibrAspire - Users</title>
    <style>
        html, body {
            min-height: 100%;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            background-image: radial-gradient(#d1d1d1 0.5px, transparent 0.5px);
            background-size: 20px 20px;
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: white;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
            color: #1b2a4e;
            text-decoration: none;
        }

        .nav-links a {
            margin-left: 30px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .nav-links a.active {
            color: #1b2a4e;
            font-weight: bold;
            border-bottom: 2px solid #1b2a4e;
        }

        .container {
            padding: 50px;
            max-width: 1000px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .table-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #1b2a4e;
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        .badge {
            padding: 5px 20px;
            border-radius: 20px;
            color: white;
            font-size: 14px;
            display: inline-block;
            min-width: 80px;
        }

        .bg-superadmin { background-color: #ff9800; }
        .bg-admin { background-color: #6f6af8; }
        .bg-member { background-color: #8dbf6a; }

        .btn-delete {
            background: #a50000;
            color: white;
            border: none;
            padding: 5px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
        }

        select {
            padding: 5px 10px;
            border-radius: 10px;
        }

        .footer {
            background: #1b2a4e;
            color: white;
            text-align: center;
            padding: 40px;
            margin-top: auto;
        }
        
        .footer p { margin: 5px 0; font-size: 14px; opacity: 0.8; }
    </style>
</head>
<body>

<div class="navbar">
    <a href="{{ route('superadmin.home') }}" class="logo">LibrAspire</a>
    <div class="nav-links">
        <a href="{{ route('superadmin.user.index') }}" class="active">Users</a>
        <a href="{{ route('superadmin.profile') }}">Profile</a>
    </div>
</div>

<div class="container">
    <h2>Users</h2>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Update Role</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <!-- BADGE -->
                    <td>
                        <span class="badge 
                            @if($user->role == 'superadmin') bg-superadmin 
                            @elseif($user->role == 'admin') bg-admin 
                            @else bg-member @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>

                    <!-- UPDATE ROLE -->
                    <td>
                        <form action="{{ route('superadmin.user.updateRole', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="role" onchange="this.form.submit()">
                                <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                            </select>
                        </form>
                    </td>

                    <!-- DELETE -->
                    <td>
                        <form action="{{ route('superadmin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="footer">
    <p>© 2025 LibrAspire. All rights reserved.</p>
    <p>Email | Twitter | Facebook | Instagram</p>
    <p>Jl Raya ITS, Surabaya, Indonesia</p>
</div>

</body>
</html>