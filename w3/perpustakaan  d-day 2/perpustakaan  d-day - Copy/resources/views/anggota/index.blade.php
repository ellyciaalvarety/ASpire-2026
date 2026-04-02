<div class="container-buku">
    <h1>📚 Daftar Buku</h1>

    @if(Auth::user() && Auth::user()->role=='admin')
        <a href ="{{ route('buku.create') }}" class="btn-tambah">+ Tambah Buku</a>
    @endif

    <table class="tabel">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $buku)
            <tr>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->stok }}</td>
                <td>
                    @if(Auth::user()->role=='admin')
                        <a href="{{ route ('buku.edit', $buku->id) }}" class="btn-edit">✏️ Edit</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="inline-form">
                            @csrf @method('delete')
                            <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</button>
                        </form>
                    @elseif(Auth::user()->role=='anggota')
                        @if($buku->stok > 0)
                            <form action="{{ route('anggota.peminjaman.store') }}" method="POST" class="inline-form">
                                @csrf
                                <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                <button type="submit" class="btn-pinjam">📥 Pinjam</button>
                            </form>
                        @else
                            <span class="stok-habis">Stok Habis</span>
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('anggota.dashboard') }}" class="btn btn-secondary">Kembali</a>
</div>

<style>
    .container-buku {
        max-width: 900px;
        margin: 40px auto;
        padding: 25px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .btn-tambah {
        display: inline-block;
        margin-bottom: 15px;
        padding: 10px 15px;
        background: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        transition: 0.3s;
    }

    .btn-tambah:hover {
        background: #2980b9;
    }

    .tabel {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .tabel th, .tabel td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    .tabel th {
        background-color: #3498db;
        color: white;
        font-weight: bold;
    }

    .tabel tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .inline-form {
        display: inline;
    }

    .btn-edit, .btn-hapus, .btn-pinjam {
        padding: 6px 12px;
        border: none;
        border-radius: 5px;
        font-size: 13px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-edit {
        background: #f1c40f;
        color: white;
        margin-right: 4px;
    }

    .btn-edit:hover {
        background: #d4ac0d;
    }

    .btn-hapus {
        background: #e74c3c;
        color: white;
    }

    .btn-hapus:hover {
        background: #c0392b;
    }

    .btn-pinjam {
        background: #27ae60;
        color: white;
    }

    .btn-pinjam:hover {
        background: #1e8449;
    }

    .stok-habis {
        color: #888;
        font-style: italic;
    }

    @media(max-width: 600px) {
        .container-buku {
            padding: 15px;
        }

        .tabel th, .tabel td {
            padding: 10px;
            font-size: 12px;
        }

        .btn-edit, .btn-hapus, .btn-pinjam {
            font-size: 11px;
            padding: 5px 10px;
        }
    }
</style>
