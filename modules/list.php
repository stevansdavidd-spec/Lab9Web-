<?php
require_once __DIR__ . '/../../config/database.php';
$statement = $pdo->query('SELECT id, nama, email, created_at FROM users ORDER BY id DESC');
$users = $statement->fetchAll();
?>
<section class="panel">
    <span class="tag">Latihan 4 — CRUD</span>
    <div class="section-heading"><h2>Data Pengguna</h2><a class="button" href="index.php?page=user/add">Tambah Pengguna</a></div>
    <?php if (!$users): ?>
        <p>Belum ada data pengguna. Tambahkan data melalui tombol di atas.</p>
    <?php else: ?>
    <div class="table-wrap"><table>
        <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Dibuat</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= (int) $user['id'] ?></td>
                <td><?= e($user['nama']) ?></td>
                <td><?= e($user['email']) ?></td>
                <td><?= e($user['created_at']) ?></td>
                <td class="actions">
                    <a href="index.php?page=user/edit&id=<?= (int) $user['id'] ?>">Edit</a>
                    <form method="post" action="index.php?page=user/delete" onsubmit="return confirm('Hapus data ini?')">
                        <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>">
                        <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                        <button class="link-button danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table></div>
    <?php endif; ?>
</section>
