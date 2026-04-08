<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book - LibrAspire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f5f6f8;
}

/* Layout utama */
.main-wrapper {
    display: flex;
    min-height: 100vh;
}

/* Sidebar kiri */
.sidebar {
    width: 260px;
    background: linear-gradient(180deg, #1e3a8a, #1d4ed8);
    color: white;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding-top: 40px;
    font-size: 24px;
    font-weight: bold;
}

/* Content kanan */
.content {
    flex: 1;
    padding: 60px;
}

/* Judul */
.title {
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 40px;
    color: #0f172a;
}

/* Form */
.form-box {
    max-width: 500px;
}

/* Group */
.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.form-group label {
    width: 130px;
    font-weight: 600;
    color: #374151;
}

.form-group input,
.form-group textarea {
    flex: 1;
    padding: 12px;
    border-radius: 12px;
    border: none;
    background: #e5e7eb;
    outline: none;
}

/* Full textarea */
.form-group.full {
    align-items: flex-start;
}

.form-group.full textarea {
    width: 100%;
}

/* Button */
.button-group {
    display: flex;
    justify-content: flex-end;
    gap: 15px;
    margin-top: 25px;
}

.btn {
    padding: 10px 30px;
    border-radius: 30px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    font-weight: 600;
}

.btn.cancel {
    background: white;
    border: 1px solid #1e3a8a;
    color: #1e3a8a;
}

.btn.submit {
    background: #0f172a;
    color: white;
}

/* Footer */
.footer {
    background: #0f1e3a;
    color: white;
    text-align: center;
    padding: 25px;
}

.footer p {
    margin: 5px 0;
}
</style>
```

</head>

<body>

<div class="main-wrapper">

```
<!-- Sidebar -->
<div class="sidebar">
    LibrAspire
</div>

<!-- Content -->
<div class="content">
    <h1 class="title">Add New Book</h1>

    <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data" class="form-box">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required>
        </div>

        <div class="form-group">
            <label>Year</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
        </div>

        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="cover" accept="image/*">
        </div>

        <div class="form-group">
            <label>Author</label>
            <input type="text" name="pengarang" value="{{ old('pengarang') }}" required>
        </div>

        <div class="form-group">
            <label>Publisher</label>
            <input type="text" name="penerbit" value="{{ old('penerbit') }}" required>
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="kategori_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>NISBN</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}" required>
        </div>

        <div class="form-group full">
            <label>Synopsis</label>
            <textarea name="sinopsis" rows="4">{{ old('sinopsis') }}</textarea>
        </div>

        <div class="button-group">
            <a href="{{ route('admin.home') }}" class="btn cancel">Cancel</a>
            <button type="submit" class="btn submit">Add</button>
        </div>
    </form>
</div>
```

</div>

<!-- Footer -->

<div class="footer">
    <p>© 2025 LibrAspire. All rights reserved.</p>
    <p>Email | Twitter | Facebook | instagram</p>
    <p>Jl Raya ITS, Surabaya, Indonesia</p>
</div>

</body>
</html>
