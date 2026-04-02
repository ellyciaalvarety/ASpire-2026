<?php
require __DIR__ . '/vendor/autoload.php';

$path = __DIR__ . '/database/database.sqlite';
if (!file_exists($path)) {
    echo json_encode(['error' => 'database file not found', 'path' => $path]);
    exit;
}

$pdo = new PDO('sqlite:' . $path);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT p.id, p.user_id, u.name as user_name, u.email as user_email, p.buku_id, b.judul as buku_judul, p.status, p.tanggal_pinjam, p.tanggal_kembali
    FROM peminjaman p
        LEFT JOIN users u ON u.id = p.user_id
        LEFT JOIN buku b ON b.id = p.buku_id
    ORDER BY p.tanggal_pinjam DESC
        LIMIT 50";

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
