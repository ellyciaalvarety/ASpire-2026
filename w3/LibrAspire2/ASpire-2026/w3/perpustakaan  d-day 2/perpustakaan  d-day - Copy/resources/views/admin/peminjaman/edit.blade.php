<style>
    .form-container {
        max-width: 450px;
        margin: 40px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #444;
    }

    select, input {
        width: 100%;
        padding: 9px;
        border: 1px solid #bbb;
        border-radius: 6px;
        font-size: 14px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        border: none;
        outline: none;
        color: white;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    .back-btn {
        display: block;
        text-align: center;
        margin-top: 12px;
        text-decoration: none;
        color: #007bff;
        font-size: 14px;
    }

    .back-btn:hover {
        text-decoration: underline;
    }
</style>

<div class="form-container">
    <h1>Edit Status Peminjaman</h1>
    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method ="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="Dipinjam" {{ $peminjaman->status=='Dipinjam' ? 'selected':'' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ $peminjaman->status=='Dikembalikan' ? 'selected':'' }}>Dikembalikan</option>
            </select>
        </div>

        <button>Update</button>
    </form>

    <a href="{{ route('peminjaman.index') }}" class="back-btn">← Kembali ke daftar peminjaman</a>
</div>