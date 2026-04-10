<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request</title>
    <style>
        html, body {
            min-height: 100%;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
            color: #1e3a8a;
            text-decoration: none;
        }

        .nav-links a {
            margin-left: 25px;
            text-decoration: none;
            color: #555;
            font-weight: 500;
        }

        .nav-links a.active {
            color: #1e3a8a;
            font-weight: bold;
        }

        /* Title */
        .title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Card Table */
        .card {
            background: white;
            width: 80%;
            margin: 30px auto;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #1e3a8a;
            color: white;
        }

        thead th {
            padding: 12px;
            text-align: left;
        }

        tbody td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        /* Button */
        .btn-edit {
            border: 1px solid #1e3a8a;
            color: #1e3a8a;
            padding: 5px 15px;
            border-radius: 20px;
            background: transparent;
            cursor: pointer;
        }

        /* Status Badge */
        .status {
            padding: 6px 15px;
            border-radius: 20px;
            color: white;
            font-size: 13px;
            font-weight: bold;
        }

        .waiting { background-color: #facc15; }
        .approved { background-color: #3b82f6; }
        .borrowed { background-color: #6366f1; }
        .returned { background-color: #10b981; }
        .late { background-color: #dc2626; }

        /* Footer */
        .footer {
            background-color: #1e3a8a;
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: auto;
        }

        .footer small {
            display: block;
            margin-top: 10px;
            color: #ddd;
        }
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
        }

        .modal-content {
            background: #eee;
            width: 400px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 20px;
            position: relative;
            text-align: left;
        }

        .modal-content h2 {
            text-align: center;
        }

        .input-status {
            width: 100%;
            padding: 8px;
            border-radius: 20px;
            border: none;
            text-align: center;
        }

        .btn-save {
            width: 100%;
            background: #1e3a8a;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('admin.home') }}" class="logo">LibrAspire</a>
        <div class="nav-links">
            <a href="#" class="active">Request</a>
            <a href="{{ route('admin.profile') }}">Profile</a>
        </div>
    </div>

    <!-- Title -->
    <div class="title">Request</div>

    <!-- Table -->
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>
                        <button class="btn-edit"
                            onclick="openModal(
                                '{{ $item->id }}',
                                '{{ $item->user->name }}',
                                '{{ $item->buku->judul }}',
                                '{{ $item->buku->isbn ?? '-' }}',
                                '{{ $item->tanggal_pinjam }}',
                                '{{ $item->tanggal_kembali ?? '-' }}',
                                '{{ $item->status }}'
                            )">
                            Edit
                        </button>

                        @php
                            $statusClass = $item->status;
                        @endphp

                        <span class="status {{ $statusClass }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        © 2025 LibrAspire. All rights reserved.
        <small>Email | Twitter | Facebook | Instagram</small>
        <small>Jl Raya ITS, Surabaya, Indonesia</small>
    </div>
<div id="modal" class="modal">
    <div class="modal-content">
        <h2>Edit</h2>

        <p><b>Name</b> : <span id="m_name"></span></p>
        <p><b>Title</b> : <span id="m_title"></span></p>
        <p><b>NISBN</b> : <span id="m_isbn"></span></p>
        <p><b>Borrow Date</b> : <span id="m_borrow"></span></p>
        <p><b>Due Date</b> : <span id="m_due"></span></p>

        <form method="POST" id="formStatus">
            @csrf
            @method('PUT')

            <label>Status</label><br>
            <select name="status" id="m_status" class="input-status">
                <option value="waiting">Waiting</option>
                <option value="approved">Approved</option>
                <option value="borrowed">Borrowed</option>
                <option value="returned">Returned</option>
                <option value="late">Late</option>
            </select>

            <br><br>
            <button type="submit" class="btn-save">Save</button>
        </form>

        <span class="close" onclick="closeModal()">×</span>
    </div>
</div>
<script>
function openModal(id, name, title, isbn, borrow, due, status) {
    document.getElementById('modal').style.display = 'block';

    document.getElementById('m_name').innerText = name;
    document.getElementById('m_title').innerText = title;
    document.getElementById('m_isbn').innerText = isbn;
    document.getElementById('m_borrow').innerText = borrow;
    document.getElementById('m_due').innerText = due;
    document.getElementById('m_status').value = status;

    // set action form
    document.getElementById('formStatus').action = "/admin/peminjaman/" + id + "/status";
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}
</script>
</body>
</html>