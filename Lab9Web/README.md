# Lab9Web - Praktikum 9: PHP Modular

Nama: Ryan Alfiyosi
NIM: 312510386
Kelas: I125B
Mata Kuliah: Pemrograman Web

## 1. Tujuan Project

Menerapkan konsep modularisasi pada aplikasi PHP dengan memisahkan bagian program ke dalam file-file dengan tanggung jawab yang jelas. Fokus utama praktikum ini meliputi pemisahan konfigurasi database, komponen antarmuka bersama (template header dan footer), helper function yang dapat digunakan kembali, sistem routing berbasis whitelist pada satu titik masuk (index.php), serta integrasi operasi CRUD database.

## 2. Kebutuhan Perangkat

* Web Server Lokal: Apache (XAMPP atau Laragon)


* PHP versi 8.x dengan ekstensi pdo_mysql aktif
* Database: MySQL atau MariaDB
* Code Editor: Visual Studio Code atau editor sejenis


* Web Browser: Chrome, Edge, atau Firefox



## 3. Struktur Direktori

```text
Lab9Web/
├── README.md
├── JAWABAN_PERTANYAAN_PEMAHAMAN.md
├── lab9_php_modular/          # Latihan dasar include/require, template, dan function
│   ├── pesan.php
│   ├── uji-include.php
│   ├── uji-require.php
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   ├── about.php
│   ├── kontak.php
│   ├── helpers.php
│   ├── latihan-function.php
│   └── style.css
└── project/                   # Aplikasi utama: Modular Routing, Helper, & CRUD
    ├── .htaccess
    ├── database.sql
    ├── index.php
    ├── config/
    │   └── database.php
    ├── views/
    │   ├── header.php
    │   ├── footer.php
    │   ├── dashboard.php
    │   ├── profil.php
    │   ├── kontak.php
    │   └── 404.php
    ├── helpers/
    │   └── functions.php
    ├── modules/
    │   └── user/
    │       ├── list.php
    │       ├── add.php
    │       ├── edit.php
    │       └── delete.php
    └── assets/
        ├── css/
        │   └── style.css
        └── js/
            └── app.js

```

## 4. Penjelasan Fungsi Setiap Bagian

1. index.php: Pintu masuk tunggal aplikasi (front controller / router) yang membaca parameter URL page, memvalidasinya dengan whitelist, lalu memuat template dan modul yang sesuai.


2. config/database.php: Mengelola konfigurasi dan koneksi database menggunakan PDO agar cukup ditulis di satu tempat.


3. views/: Menyimpan template antarmuka bersama (header.php dan footer.php) serta halaman statis seperti dashboard.php, profil.php, kontak.php, dan halaman error 404.php.


4. helpers/functions.php: Menyimpan kumpulan fungsi bantuan umum agar tidak ditulis berulang, seperti e() untuk sanitasi HTML (escaping), formatRupiah(), hitungDiskon(), validasiEmail(), ringkasTeks(), serta pengelolaan flash message.


5. modules/user/: Mengelompokkan fitur CRUD data pengguna secara terpisah (list.php untuk tampil data, add.php untuk tambah data, edit.php untuk ubah data, dan delete.php untuk hapus data via POST).


6. assets/: Menyimpan file statis seperti stylesheet CSS dan script JavaScript.


7. .htaccess: Mengatur aturan URL rewrite pada Apache agar alamat URL menjadi lebih ringkas tanpa harus menampilkan index.php?page=.



## 5. Cara Menjalankan Aplikasi

1. Ekstrak dan salin folder Lab9Web (berisi lab9_php_modular dan project) ke dalam direktori htdocs (XAMPP) atau www (Laragon).


2. Jalankan layanan Apache dan MySQL melalui control panel XAMPP atau Laragon.


3. Buka phpMyAdmin (http://localhost/phpmyadmin), kemudian impor file project/database.sql untuk membuat database db_latihan beserta tabel users.


4. Untuk menguji latihan dasar modularisasi, buka http://localhost/Lab9Web/lab9_php_modular/home.php di browser.


5. Untuk menjalankan aplikasi utama (routing dan CRUD), buka http://localhost/Lab9Web/project/index.php di browser.



## 6. Daftar Rute Aplikasi (project/index.php)

| Parameter page | File Tujuan | Keterangan |
| --- | --- | --- |
| dashboard (default) | views/dashboard.php | Halaman utama dan demo helper function |
| profil | views/profil.php | Halaman profil mahasiswa |
| kontak | views/kontak.php | Halaman informasi kontak |
| user/list | modules/user/list.php | Menampilkan daftar data pengguna (Read) |
| user/add | modules/user/add.php | Form penambahan data pengguna baru (Create) |
| user/edit | modules/user/edit.php | Form perubahan data pengguna (Update) |
| user/delete | modules/user/delete.php | Proses penghapusan data pengguna melalui POST (Delete) |
| (rute tidak terdaftar) | views/404.php | Halaman error 404 apabila rute tidak ada di dalam whitelist |

## 7. Ringkasan Langkah Praktikum

1. Pengujian include dan require: Membandingkan perilaku pemanggilan file pesan.php ketika file tidak ditemukan. Konstruksi include menampilkan Warning namun tetap melanjutkan eksekusi baris berikutnya, sedangkan require menampilkan Fatal error dan langsung menghentikan eksekusi program.


2. Pembuatan Template Layout: Memisahkan bagian pembuka HTML dan navigasi ke header.php serta bagian penutup ke footer.php, lalu memanggilnya pada halaman home.php, about.php, kontak.php, dan latihan-function.php menggunakan require_once.


3. Pembuatan Function Helper: Membuat berbagai fungsi dengan parameter, type declaration, nilai default, dan nilai return pada file terpisah agar dapat dipakai ulang lintas halaman.


4. Penataan Struktur Direktori dan Routing: Mengorganisasi folder sesuai tanggung jawab masing-masing dan membangun router berbasis array whitelist ($routes) pada index.php untuk mencegah celah path traversal.


5. Integrasi CRUD dan URL Rewrite: Menghubungkan operasi database (Create, Read, Update, Delete) ke dalam sistem routing modular serta menambahkan konfigurasi .htaccess untuk mendukung URL bersih.



## 8. Kendala dan Solusi

1. Kendala: Muncul pesan error Failed opening required akibat perubahan path relatif saat file dipanggil melalui router index.php.
Solusi: Menggunakan konstanta bawaan PHP **DIR** pada setiap pemanggilan include maupun require_once agar path selalu mengacu pada direktori absolut file pemanggil.


2. Kendala: Terjadi error headers already sent ketika melakukan redirect header('Location: ...') setelah proses simpan atau edit data di dalam modul.
Solusi: Menjalankan modul dan menampung output-nya terlebih dahulu menggunakan output buffering (ob_start() dan ob_get_clean()) pada index.php sebelum menampilkan views/header.php.