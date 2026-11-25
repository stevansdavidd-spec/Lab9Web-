<?php
declare(strict_types=1);

function tampilkanSalam(): void
{
    echo 'Selamat belajar PHP modular!';
}

function sapaPengguna(string $nama): string
{
    return 'Halo, ' . e($nama);
}

function hitungLuasPersegiPanjang(float $panjang, float $lebar): float
{
    return $panjang * $lebar;
}

function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

function konversiCelciusKeFahrenheit(float $c): float
{
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai(float $nilai): string
{
    if ($nilai < 0 || $nilai > 100) {
        return 'Nilai tidak valid';
    }
    if ($nilai >= 85) {
        return 'A';
    }
    if ($nilai >= 75) {
        return 'B';
    }
    if ($nilai >= 65) {
        return 'C';
    }
    if ($nilai >= 50) {
        return 'D';
    }
    return 'E';
}

function hitungTotal(float $harga, int $jumlah): float
{
    return max(0, $harga) * max(0, $jumlah);
}

function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $batas = 80): string
{
    $teks = trim($teks);
    if ($batas < 1 || mb_strlen($teks, 'UTF-8') <= $batas) {
        return $teks;
    }
    return rtrim(mb_substr($teks, 0, $batas, 'UTF-8')) . '...';
}

function csrfToken(): string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken(?string $token): bool
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    return is_string($token)
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}
