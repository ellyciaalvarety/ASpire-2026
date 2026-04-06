<?php
require __DIR__ . '/vendor/autoload.php';
$path = __DIR__ . '/database/database.sqlite';
if (!file_exists($path)) {
    echo json_encode(['error' => 'sqlite file not found', 'path' => $path]);
    exit(0);
}
try {
    $pdo = new PDO("sqlite:$path");
    $stmt = $pdo->query('SELECT id, name, email, role, created_at FROM users WHERE role IN ("anggota","user")');
    $rows = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    echo json_encode($rows);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
