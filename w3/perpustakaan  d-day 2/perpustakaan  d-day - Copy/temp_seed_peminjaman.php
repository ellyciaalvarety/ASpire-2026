<?php
require __DIR__ . '/vendor/autoload.php';

$path = __DIR__ . '/database/database.sqlite';
if (!file_exists($path)) {
    echo json_encode(['error' => 'database file not found', 'path' => $path]);
    exit;
}
$pdo = new PDO('sqlite:' . $path);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// find an anggota user
$u = $pdo->query("SELECT id, name, email FROM users WHERE role = 'anggota' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
if (!$u) { echo json_encode(['error' => 'no anggota user found']); exit; }

// find a buku with stok > 0
$b = $pdo->query("SELECT id, judul, stok FROM buku WHERE stok > 0 LIMIT 1")->fetch(PDO::FETCH_ASSOC);
if (!$b) { echo json_encode(['error' => 'no buku with stok>0 found']); exit; }

// decrement stok
$newStok = max(0, $b['stok'] - 1);
$update = $pdo->prepare('UPDATE buku SET stok = :stok WHERE id = :id');
$update->execute([':stok' => $newStok, ':id' => $b['id']]);

// insert peminjaman (tanggal_pinjam as today, tanggal_kembali default 7 days later)
$insert = $pdo->prepare('INSERT INTO peminjaman (user_id, buku_id, tanggal_pinjam, tanggal_kembali, status) VALUES (:user_id, :buku_id, :tanggal_pinjam, :tanggal_kembali, :status)');
$insert->execute([
    ':user_id' => $u['id'],
    ':buku_id' => $b['id'],
    ':tanggal_pinjam' => date('Y-m-d'),
    ':tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
    ':status' => 'Dipinjam'
]);

echo json_encode(['inserted_peminjaman_for' => $u, 'buku' => $b, 'new_stok' => $newStok], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
