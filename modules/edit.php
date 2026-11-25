<?php
require_once __DIR__ . '/../../config/database.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(404);
    echo '<section class="panel"><h2>Data tidak ditemukan</h2><a href="index.php?page=user/list">Kembali</a></section>';
    return;
}
$stmt = $pdo->prepare('SELECT id, nama, email FROM users WHERE id = :id');
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();
if (!$user) {
    http_response_code(404);
    echo '<section class="panel"><h2>Data tidak ditemukan</h2><a href="index.php?page=user/list">Kembali</a></section>';
    return;
}
$errors = [];
$nama = $user['nama'];
$email = $user['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim((string) ($_POST['nama'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    if (!verifyCsrfToken($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Token keamanan tidak valid. Muat ulang halaman dan coba lagi.';
    }
    if ($nama === '') $errors[] = 'Nama wajib diisi.';
    if (!validasiEmail($email)) $errors[] = 'Format email tidak valid.';
    if (!$errors) {
        $update = $pdo->prepare('UPDATE users SET nama = :nama, email = :email WHERE id = :id');
        $update->execute(['nama' => $nama, 'email' => $email, 'id' => $id]);
        header('Location: index.php?page=user/list&status=updated');
        exit;
    }
}
?>
<section class="panel">
    <span class="tag">CRUD — Update</span>
    <h2>Edit Pengguna</h2>
    <?php foreach ($errors as $error): ?><p class="error-message"><?= e($error) ?></p><?php endforeach; ?>
    <form method="post" class="form">
        <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>">
        <label>Nama <input type="text" name="nama" value="<?= e($nama) ?>" required maxlength="100"></label>
        <label>Email <input type="email" name="email" value="<?= e($email) ?>" required maxlength="150"></label>
        <div class="form-actions"><button class="button" type="submit">Perbarui</button><a href="index.php?page=user/list">Batal</a></div>
    </form>
</section>
