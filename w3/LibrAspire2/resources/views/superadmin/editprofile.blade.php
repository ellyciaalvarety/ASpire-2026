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
            background-image: radial-gradient(#d1d1d1 0.8px, transparent 0.8px);
            background-size: 20px 20px;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(to bottom, #0a2e7a, #1b2a4e);
            color: white;
            padding: 30px;
        }

        .sidebar h2 {
            font-size: 24px;
            margin: 0;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .edit-title {
            color: #1b2a4e;
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 40px;
        }

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
        }

        .form-group input {
            flex: 1;
            padding: 12px 20px;
            border-radius: 25px;
            border: none;
            background-color: #e8e8e8;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 40px;
        }

        .btn {
            padding: 10px 40px;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            border: 2px solid #1b2a4e;
        }

        .btn-cancel {
            color: #1b2a4e;
        }

        .btn-save {
            background-color: #1b2a4e;
            color: white;
        }

        .alert-error {
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .preview-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>LibrAspire</h2>
</div>

<div class="main-content">
    <h1 class="edit-title">Edit Profile</h1>

    <div class="form-container">

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR --}}
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

            {{-- NAME --}}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            {{-- EMAIL --}}
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            {{-- FOTO --}}
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="foto" onchange="previewImage(event)">
                @if($user->foto)
                    <img id="preview" src="{{ asset('storage/'.$user->foto) }}" class="preview-img">
                @else
                    <img id="preview" class="preview-img" style="display:none;">
                @endif
            </div>

            {{-- PASSWORD --}}
            <div class="form-group">
                <label>Old Password</label>
                <input type="password" name="old_password">
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password">
            </div>

            <div class="form-group">
                <label>Confirm</label>
                <input type="password" name="new_password_confirmation">
            </div>

            <div class="button-group">
                <a href="{{ route(auth()->user()->role . '.profile') }}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-save">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const img = document.getElementById('preview');
        img.src = reader.result;
        img.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>