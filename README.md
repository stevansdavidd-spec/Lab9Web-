# Lab9Web — Praktikum 9 PHP Modular

**Nama:** Stevanus David  
**NIM:** 312410106  
**Jurusan:** Teknik Informatika  
**Mata Kuliah:** Pemrograman Web

Project ini mengerjakan latihan Praktikum 9: PHP Modular berdasarkan modul, meliputi pengujian `include`/`require`, template multi-halaman, library function, struktur direktori modular, routing whitelist, halaman 404, dan contoh CRUD database.

## Kebutuhan
- PHP 8.0+ (disarankan PHP 8.1+)
- Apache (XAMPP/Laragon) atau PHP built-in server
- MySQL/MariaDB untuk fitur CRUD database
- Browser dan editor kode

## Cara menjalankan
1. Ekstrak folder `Lab9Web` ke `htdocs` (XAMPP) atau document root web server.
2. Untuk mencoba halaman tanpa database, jalankan server dari folder project:
   ```bash
   php -S localhost:8000
   ```
3. Buka `http://localhost:8000/`.
4. Menu Home, Profil, Kontak, Library Function, Demo Include/Require, dan CRUD tersedia melalui navigasi.
5. Untuk CRUD, buat database `lab9web` lalu import `database.sql` melalui phpMyAdmin atau MySQL CLI.
6. Sesuaikan kredensial pada `config/database.php`, lalu buka menu Data Pengguna.

> Halaman non-database tetap dapat dijalankan meskipun MySQL belum dikonfigurasi. Koneksi database hanya dipanggil saat rute CRUD dibuka.

## Struktur direktori
```text
Lab9Web/
├── index.php
├── .htaccess
├── database.sql
├── config/
│   └── database.php
├── helpers/
│   └── functions.php
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   ├── profile.php
│   ├── contact.php
│   ├── functions-demo.php
│   └── 404.php
├── modules/
│   └── user/
│       ├── list.php
│       ├── add.php
│       ├── edit.php
│       └── delete.php
├── lab/
│   ├── pesan.php
│   ├── uji-include.php
│   └── uji-require.php
└── assets/
    └── css/
        └── style.css
```

## Daftar rute
| URL | Keterangan |
|---|---|
| `index.php` atau `?page=home` | Home / dashboard |
| `?page=profile` | Profil |
| `?page=contact` | Kontak |
| `?page=functions` | Demonstrasi function |
| `?page=include-test` | Pengujian include |
| `?page=require-test` | Pengujian require |
| `?page=user/list` | Daftar pengguna |
| `?page=user/add` | Tambah pengguna |
| `?page=user/edit&id=1` | Ubah pengguna |
| `?page=user/delete` | Hapus pengguna melalui POST |
| `?page=unknown` | Halaman 404 |

Router menggunakan whitelist. Nilai `page` tidak pernah digabung langsung menjadi path file.

## Pemetaan pengerjaan terhadap modul
1. **Praktik include dan require (bagian C):** `lab/pesan.php`, `lab/uji-include.php`, dan `lab/uji-require.php`.
   - Ubah sementara nama `lab/pesan.php` untuk mengamati warning pada include dan fatal error pada require.
   - Kembalikan nama file setelah pengujian.
2. **Template multi-halaman (bagian D dan Latihan 1):** `views/header.php` dan `views/footer.php` dipakai oleh semua halaman Home, Profil, dan Kontak.
3. **Function (bagian E dan Latihan function):** seluruh function diletakkan di `helpers/functions.php`, termasuk `tampilkanSalam`, `sapaPengguna`, `hitungLuasPersegiPanjang`, `hitungDiskon`, `formatRupiah`, `e`, `konversiCelciusKeFahrenheit`, `tentukanStatusNilai`, `hitungTotal`, `validasiEmail`, dan `ringkasTeks`.
4. **Library function (Latihan 2):** empat function wajib (`formatRupiah`, `hitungDiskon`, `validasiEmail`, `ringkasTeks`) dipakai pada lebih dari satu halaman.
5. **Router aman (bagian G dan Latihan 3):** `index.php` memiliki lebih dari lima rute, whitelist, validasi tipe input, dan respons 404.
6. **Integrasi CRUD (bagian I dan Latihan 4):** contoh CRUD mandiri disediakan di `modules/user/`, dengan koneksi terpusat di `config/database.php`, template bersama, validasi input, operasi perubahan melalui POST, dan token CSRF.
7. **URL rewrite opsional (bagian H):** `.htaccess` mengarahkan URL bersih ke router jika `mod_rewrite` dan `AllowOverride` aktif.

## Pengujian
- Buka Home, Profil, dan Kontak; header, navigasi, dan footer harus sama sedangkan konten berbeda.
- Buka Library Function dan pastikan hasil konversi, predikat, diskon, validasi email, serta format rupiah tampil.
- Uji `?page=user/list`, `?page=user/add`, dan `?page=admin/rahasia`; rute terakhir harus menghasilkan halaman 404.
- Uji form tambah, edit, dan hapus setelah database disiapkan.
- Uji `lab/uji-include.php` dan `lab/uji-require.php`. Untuk uji file hilang, rename `pesan.php` sementara, jalankan masing-masing halaman, lalu pulihkan nama file.

## Catatan integrasi
Modul meminta refactoring aplikasi CRUD dari praktikum sebelumnya. Source project CRUD sebelumnya tidak disertakan bersama modul Praktikum 9, sehingga folder `modules/user/` di repository ini merupakan implementasi CRUD contoh yang berdiri sendiri, bukan perubahan terhadap source CRUD lama. Jika source CRUD lama tersedia, pemetaan tabel dan prosesnya dapat disesuaikan tanpa mengubah pola modularisasi.

## Kendala umum
- **Koneksi gagal:** pastikan MySQL aktif, database `lab9web` sudah dibuat/import, dan kredensial `config/database.php` benar.
- **CSS tidak tampil:** pastikan URL project sesuai lokasi folder dan file `assets/css/style.css` tersedia.
- **404 router:** gunakan salah satu nilai `page` pada daftar rute.
- **URL rewrite tidak bekerja:** aktifkan `mod_rewrite`, `AllowOverride All`, dan pastikan `.htaccess` berada di root project. Rute query-string tetap dapat digunakan tanpa rewrite.
