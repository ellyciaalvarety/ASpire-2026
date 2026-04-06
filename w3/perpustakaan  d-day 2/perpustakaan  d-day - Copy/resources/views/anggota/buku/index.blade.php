<div>
    <h1>Daftar Buku - Perpustakaan</h1>
    
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    <table>
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
            @forelse($data as $buku)
            <tr>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->stok }}</td>
                <td>
                    @if($buku->stok > 0)
                        <form action="{{ route('anggota.peminjaman.store') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                            <button type="submit">📥 Pinjam</button>
                        </form>
                    @else
                        <span style="color:#999">Stok Habis</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada buku tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ route('logout') }}">Logout</a></p>
</div>
