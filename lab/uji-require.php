<section class="panel">
    <span class="tag">Bagian C — Pengujian require</span>
    <h2>Uji require</h2>
    <p>Sebelum pemanggilan file.</p>
    <?php require __DIR__ . '/pesan.php'; ?>
    <p>Sesudah pemanggilan file. Baris ini tidak dijalankan jika file require tidak ditemukan.</p>
    <p class="muted">Untuk mengamati perbedaan, ubah nama lab/pesan.php sementara lalu muat ulang halaman ini. Pulihkan nama file setelah selesai.</p>
</section>
