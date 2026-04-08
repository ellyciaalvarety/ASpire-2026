<div class="form-container">
    <h1>Edit User</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $user->nama }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Update</button>
    </form>
</div>

<style>
    .form-container {
        max-width: 480px;
        margin: 50px auto;
        padding: 25px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.4rem;
        font-weight: 600;
        color: #34495e;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #d1d5db;
        border-radius: 5px;
        font-size: 0.95rem;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 4px rgba(52, 152, 219, 0.4);
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: #27ae60;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #1e8449;
    }
</style>
