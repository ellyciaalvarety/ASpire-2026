<div class="form-container">
    <h1>Tambah Peminjaman</h1>
    <form action="{{ route('peminjaman.store') }}" method ="POST">
        @csrf

        <div class="form-group">
            <label>Nama User</label>
            <select name="user_id" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Judul Buku</label>
            <select name="buku_id" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }} (Stok: {{ $buku->stok }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit">Simpan</button>
    </form>
    <a href="{{ route('peminjaman.index') }}" class="back-btn">← Kembali ke daftar peminjaman</a>
</div>


<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 0;
    }

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
        display:block; margin-bottom:6px; color:#333; font-weight:600;
    }
    .form-group select {
        width:100%; padding:10px 12px; border:1px solid #6da9f3ff;
    }
</style>