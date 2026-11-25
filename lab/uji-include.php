<section class="panel">
    <span class="tag">Bagian C — Pengujian include</span>
    <h2>Uji include</h2>
    <p>Sebelum pemanggilan file.</p>
    <?php include __DIR__ . '/pesan.php'; ?>
    <p>Sesudah pemanggilan file. Baris ini umumnya tetap dijalankan meskipun file include tidak ditemukan.</p>
    <p class="muted">Untuk mengamati perbedaan, ubah nama lab/pesan.php sementara lalu muat ulang halaman ini. Pulihkan nama file setelah selesai.</p>
</section>
