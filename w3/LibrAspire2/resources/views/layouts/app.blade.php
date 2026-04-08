<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LibrAspire2 - @yield('title', 'Admin Panel')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #2c3e50;
        }
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #1a252f;
        }
        .sidebar a.active {
            background-color: #3498db;
        }
        .sidebar i {
            margin-right: 10px;
            width: 20px;
        }
        .content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar-top {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="p-3 text-white text-center border-bottom">
                    <h4>📚 LibrAspire2</h4>
                    <small>{{ Auth::user()->name ?? 'Admin' }}</small>
                    <br>
                    <small class="badge bg-info">{{ Auth::user()->role ?? 'admin' }}</small>
                </div>
                <div class="mt-3">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="{{ url('/admin/buku') }}" class="{{ request()->is('admin/buku*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i> Data Buku
                    </a>
                    <a href="{{ url('/admin/peminjaman') }}">
                        <i class="fas fa-hand-holding"></i> Peminjaman
                    </a>
                    <a href="{{ url('/profile/edit') }}">
                        <i class="fas fa-user"></i> Profil
                    </a>
                    <hr class="bg-secondary">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;"></form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <div class="navbar-top p-3">
                    <h5 class="mb-0">
                        @yield('page-title', 'Dashboard')
                    </h5>
                </div>
                <div class="p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>