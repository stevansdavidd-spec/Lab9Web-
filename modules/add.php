<?php
require_once __DIR__ . '/../../config/database.php';
$errors = [];
$nama = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim((string) ($_POST['nama'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    if (!verifyCsrfToken($_POST['csrf_token'] ?? null)) {
        $errors[] = 'Token keamanan tidak valid. Muat ulang halaman dan coba lagi.';
    }
    if ($nama === '') {
        $errors[] = 'Nama wajib diisi.';
    }
    if (!validasiEmail($email)) {
        $errors[] = 'Format email tidak valid.';
    }
    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO users (nama, email) VALUES (:nama, :email)');
        $stmt->execute(['nama' => $nama, 'email' => $email]);
        header('Location: index.php?page=user/list&status=added');
        exit;
    }
}
?>
<section class="panel">
    <span class="tag">CRUD — Create</span>
    <h2>Tambah Pengguna</h2>
    <?php foreach ($errors as $error): ?><p class="error-message"><?= e($error) ?></p><?php endforeach; ?>
    <form method="post" class="form">
        <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>">
        <label>Nama <input type="text" name="nama" value="<?= e($nama) ?>" required maxlength="100"></label>
        <label>Email <input type="email" name="email" value="<?= e($email) ?>" required maxlength="150"></label>
        <div class="form-actions"><button class="button" type="submit">Simpan</button><a href="index.php?page=user/list">Batal</a></div>
    </form>
</section>
