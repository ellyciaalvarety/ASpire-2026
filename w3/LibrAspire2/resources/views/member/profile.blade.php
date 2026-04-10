<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Profile - LibrAspire</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            background-image: radial-gradient(#d1d1d1 0.5px, transparent 0.5px);
            background-size: 20px 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 20px 50px;
            align-items: center;
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
            color: #666;
        }

        .nav-links a.active {
            color: #1b2a4e;
            font-weight: bold;
        }

        /* 🔥 FIX LAYOUT */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 0;
        }

        .profile-card {
            background: #1b2a4e;
            width: 850px;
            border-radius: 30px;
            padding: 50px;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            box-shadow: 0 30px 60px rgba(0,0,0,0.18);
        }

        .profile-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 60px;
            border: 3px solid rgba(255,255,255,0.3);
        }

        .profile-info {
            flex: 1;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            font-size: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
        }

        .logout-btn {
            color: #ff4d4d;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        .btn-edit {
            position: absolute;
            bottom: 40px;
            right: 50px;
            background: white;
            color: #1b2a4e;
            padding: 12px 50px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
        }

        /* HISTORY */
        .history-box {
            width: 950px;
            margin-top: 30px;
        }

        .history-title {
            color: #1b2a4e;
            margin-bottom: 15px;
        }

        .table-wrapper {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #142c5c;
            color: white;
        }

        th {
            padding: 15px;
        }

        td {
            padding: 15px;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background: #f5f7fb;
        }

        /* 🔥 STATUS BADGE */
        .status {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            color: white;
            display: inline-block;
            min-width: 90px;
            text-align: center;
        }

        .waiting { background-color: #facc15; }
        .approved { background-color: #3b82f6; }
        .borrowed { background-color: #6366f1; }
        .returned { background-color: #10b981; }
        .late { background-color: #dc2626; }

        @media(max-width: 900px) {
            .profile-card, .history-box {
                width: 90%;
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

<div class="navbar">
    <a href="{{ route('member.home') }}" class="logo">LibrAspire</a>
    <div class="nav-links">
        <a href="{{ route('member.home') }}">Home</a>
        <a href="{{ route('member.contact') }}">Contact</a>
        <a href="{{ route('member.profile') }}" class="active">Profile</a>
    </div>
</div>

<div class="container">

    <!-- PROFILE -->
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

        <a href="{{ route('member.editprofile') }}" class="btn-edit">Edit</a>
    </div>

    <!-- HISTORY -->
    <div class="history-box">
        <h2 class="history-title">History</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th style="text-align:left;">Title</th>
                        <th>Borrow Date</th>
                        <th>Due Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
    @forelse($peminjaman ?? [] as $item)

    <tr>
        <td>{{ $item->buku->judul ?? '-' }}</td>

        <td style="text-align:center;">
            {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d F Y') }}
        </td>

        <td style="text-align:center;">
            {{ $item->tanggal_kembali 
                ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d F Y') 
                : '-' }}
        </td>

        <td style="text-align:center;">
            @if($item->status == 'waiting')
                <span class="status waiting">Waiting</span>

            @elseif($item->status == 'approved')
                <span class="status approved">Approved</span>

            @elseif($item->status == 'borrowed')
                <span class="status borrowed">Borrowed</span>

            @elseif($item->status == 'returned')
                <span class="status returned">Returned</span>

            @elseif($item->status == 'late')
                <span class="status late">Late</span>

            @else
                <span class="status">{{ $item->status }}</span>
            @endif
        </td>
    </tr>

    @empty
    <tr>
        <td colspan="4" style="text-align:center;">
            No history available
        </td>
    </tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>
<footer class="footer">
        <p>© 2025 LibrAspire. All rights reserved.</p>
        <p>Email | Twitter | Facebook | Instagram</p>
        <p>Jl Raya ITS, Surabaya, Indonesia</p>
    </footer>
</div>

</body>
</html>