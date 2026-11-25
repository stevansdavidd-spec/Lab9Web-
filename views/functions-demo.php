<?php
// Function diambil dari helpers/functions.php dan digunakan pada halaman ini.
$celcius = 25;
$nilai = 88;
$harga = 150000;
$jumlah = 3;
$emailContoh = 'mahasiswa@example.com';
$deskripsi = 'Modularisasi membagi aplikasi menjadi bagian kecil sesuai tanggung jawabnya agar mudah digunakan kembali dan dipelihara.';
?>
<section class="panel">
    <span class="tag">Latihan Function dan Library Function</span>
    <h2>Demonstrasi Function PHP</h2>
    <div class="result-list">
        <div class="result"><span>Salam</span><strong><?php tampilkanSalam(); ?></strong></div>
        <div class="result"><span>Sapa pengguna</span><strong><?= sapaPengguna('Stevanus David') ?></strong></div>
        <div class="result"><span>Luas persegi panjang (8 × 5)</span><strong><?= hitungLuasPersegiPanjang(8, 5) ?></strong></div>
        <div class="result"><span>Konversi <?= $celcius ?>°C ke Fahrenheit</span><strong><?= number_format(konversiCelciusKeFahrenheit($celcius), 1) ?>°F</strong></div>
        <div class="result"><span>Predikat nilai <?= $nilai ?></span><strong><?= e(tentukanStatusNilai($nilai)) ?></strong></div>
        <div class="result"><span>Diskon 10% dari <?= formatRupiah($harga) ?></span><strong><?= formatRupiah(hitungDiskon($harga)) ?></strong></div>
        <div class="result"><span>Total belanja (<?= formatRupiah($harga) ?> × <?= $jumlah ?>)</span><strong><?= formatRupiah(hitungTotal($harga, $jumlah)) ?></strong></div>
        <div class="result"><span>Validasi email <?= e($emailContoh) ?></span><strong><?= validasiEmail($emailContoh) ? 'Valid' : 'Tidak valid' ?></strong></div>
        <div class="result"><span>Ringkasan teks</span><strong><?= e(ringkasTeks($deskripsi, 70)) ?></strong></div>
    </div>
    <p class="notice">Semua function didefinisikan satu kali di <code>helpers/functions.php</code> dan dapat dipanggil oleh halaman lain.</p>
</section>
