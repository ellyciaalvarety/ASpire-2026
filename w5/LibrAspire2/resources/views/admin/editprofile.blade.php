<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - LibrAspire</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            /* Latar belakang grid sesuai gambar */
            background-image: radial-gradient(#d1d1d1 0.8px, transparent 0.8px);
            background-size: 20px 20px;
            display: flex;
            height: 100vh;
        }

        /* Sidebar Biru */
        .sidebar {
            width: 280px;
            background: linear-gradient(to bottom, #0a2e7a, #1b2a4e);
            color: white;
            padding: 30px;
            display: flex;
            flex-direction: column;
        }

        .sidebar .brand {
            font-size: 24px;
            margin: 0;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .edit-title {
            color: #1b2a4e;
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        /* Form Styling */
        .form-container {
            width: 100%;
            max-width: 600px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 150px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            flex: 1;
            padding: 12px 20px;
            border-radius: 25px;
            border: none;
            background-color: #e8e8e8;
            font-size: 16px;
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
        }

        /* Buttons */
        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 50px;
        }

        .btn {
            padding: 10px 50px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
            border: 2px solid #1b2a4e;
        }

        .btn-cancel {
            background-color: transparent;
            color: #1b2a4e;
        }

        .btn-cancel:hover {
            background-color: #eee;
        }

        .btn-save {
            background-color: #1b2a4e;
            color: white;
        }

        .btn-save:hover {
            background-color: #15223d;
        }

        /* Alert Error */
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="{{ route('admin.home') }}" class="brand">LibrAspire</a>
    </div>

    <div class="main-content">
        <h1 class="edit-title">Edit Profile</h1>

        <div class="form-container">
            @if($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="foto">Photo</label>
                    <input type="file" id="foto" name="foto">
                </div>

                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" id="old_password" name="old_password" placeholder="Confirm current password">
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" placeholder="Leave blank to keep old">
                </div>

                <div class="button-group">
                    <a href="{{ route('admin.profile') }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-save">Save</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>