<div class="riwayat-container">
    <h1>📖 Riwayat Peminjaman Saya</h1>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    @if(isset($peminjaman) && count($peminjaman) > 0)
        <table class="tabel-riwayat">
            <thead>
                <tr>
                    <th>📚 Buku</th>
                    <th>📅 Tanggal Pinjam</th>
                    <th>📆 Tanggal Kembali</th>
                    <th>⏳ Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $p)
                    <tr>
                        <td>{{ optional($p->buku)->judul ?? '-' }}</td>
                        <td>{{ $p->tanggal_pinjam }}</td>
                        <td>{{ $p->tanggal_kembali ?? '-' }}</td>
                        <td>
                            <span class="status {{ strtolower($p->status) }}">
                                {{ $p->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-data">Tidak ada riwayat peminjaman.</p>
    @endif
    
    <a href="{{ route('anggota.dashboard') }}" class="btn btn-secondary">Kembali</a>
</div>

<style>
    .riwayat-container {
        max-width: 850px;
        margin: 40px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .alert {
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .alert.success {
        background: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert.error {
        background: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .tabel-riwayat {
        width: 100%;
        border-collapse: collapse;
    }

    .tabel-riwayat th, .tabel-riwayat td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
        text-align: center;
    }

    .tabel-riwayat th {
        background-color: #3498db;
        color: white;
    }

    .tabel-riwayat tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .no-data {
        text-align: center;
        font-style: italic;
        color: #888;
    }

    .status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }
    .status.dipinjam {
        background: #f1c40f;
        color: #fff;
    }
    .status.dikembalikan {
        background: #27ae60;
        color: #fff;
    }

    @media(max-width: 600px) {
        .riwayat-container {
            padding: 15px;
        }

        .tabel-riwayat th, .tabel-riwayat td {
            padding: 10px;
            font-size: 12px;
        }

        .status {
            font-size: 11px;
            padding: 4px 8px;
        }
    }
</style>
