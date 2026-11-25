<?php
require_once __DIR__ . '/../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo '<section class="panel"><h2>Metode tidak diizinkan</h2><p>Penghapusan hanya dapat dilakukan melalui POST.</p><a href="index.php?page=user/list">Kembali</a></section>';
    return;
}
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!verifyCsrfToken($_POST['csrf_token'] ?? null) || !$id || $id < 1) {
    http_response_code(400);
    echo '<section class="panel"><h2>Permintaan tidak valid</h2><a href="index.php?page=user/list">Kembali</a></section>';
    return;
}
$stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
$stmt->execute(['id' => $id]);
header('Location: index.php?page=user/list&status=deleted');
exit;
