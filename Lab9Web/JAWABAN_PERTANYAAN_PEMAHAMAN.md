# Jawaban Pertanyaan Pemahaman (Bagian L)

1. **Pengertian modularisasi program dan tiga manfaatnya:**
   Modularisasi adalah teknik memecah kode aplikasi menjadi bagian-bagian kecil (modul) berdasarkan fungsi atau tanggung jawab masing-masing.
   - **Manfaat 1 (Reusability):** Komponen seperti header, footer, dan fungsi bantuan cukup ditulis sekali lalu dipakai ulang di banyak halaman.
   - **Manfaat 2 (Mudah Dipelihara):** Perubahan pada navigasi atau koneksi database cukup dilakukan di satu file tanpa mengedit seluruh halaman.
   - **Manfaat 3 (Kolaborasi Tim Lebih Aman):** Struktur kode terpisah jelas sehingga mengurangi konflik saat dikerjakan lebih dari satu orang.

2. **Perbedaan `include` dan `require` ketika file tidak ditemukan:**
   - `include` menghasilkan pesan peringatan (*Warning*) dan **tetap melanjutkan** eksekusi baris kode berikutnya.
   - `require` menghasilkan kesalahan fatal (*Fatal error*) dan **langsung menghentikan** eksekusi skrip.

3. **Mengapa `require_once` sesuai untuk memuat konfigurasi database:**
   Karena konfigurasi database adalah file inti yang wajib ada (jika gagal harus berhenti dengan *Fatal error*), serta tidak boleh dimuat lebih dari satu kali agar tidak terjadi duplikasi koneksi atau error deklarasi ulang.

4. **Perbedaan parameter, argumen, dan nilai `return` pada function:**
   - **Parameter:** Variabel yang ditulis di dalam tanda kurung saat mendeklarasikan function.
   - **Argumen:** Nilai aktual yang dikirimkan saat function tersebut dipanggil.
   - **Nilai `return`:** Hasil keluaran yang dikembalikan oleh function ke bagian kode pemanggil agar bisa disimpan ke variabel atau diolah lebih lanjut.

5. **Mengapa header dan footer sebaiknya dipisahkan dari konten halaman:**
   Agar struktur tampilan utama seragam di seluruh halaman dan tidak terjadi duplikasi kode HTML yang menyulitkan saat ada perubahan desain atau menu navigasi.

6. **Fungsi `index.php` pada pola routing yang dipraktikkan:**
   Berfungsi sebagai pintu masuk tunggal (*front controller* / router) yang membaca parameter URL (`$_GET['page']`), memvalidasi rute terhadap daftar whitelist, lalu memuat template dan modul konten yang sesuai.

7. **Mengapa router sebaiknya menggunakan whitelist rute:**
   Untuk memastikan hanya halaman/modul yang memang diizinkan oleh aplikasi yang dapat diakses, sehingga mencegah pengguna membuka file internal atau sistem yang tidak semestinya.

8. **Risiko jika input `page` langsung digabungkan menjadi path file yang di-`require`:**
   Membuka celah keamanan **Path Traversal / Local File Inclusion (LFI)**, di mana penyerang bisa memanipulasi URL (misalnya `../../file_rahasia`) untuk mengeksekusi atau membaca file sensitif di server.

9. **Fungsi aturan `RewriteCond` dan `RewriteRule` pada `.htaccess`:**
   - `RewriteCond %{REQUEST_FILENAME} !-f` dan `!-d` mengecek apakah URL yang diminta bukan file fisik dan bukan folder fisik yang ada di server.
   - `RewriteRule ^(.+)$ index.php?page=$1 [QSA,L]` meneruskan permintaan URL tersebut ke `index.php` sebagai parameter `page` sambil mempertahankan query string (`QSA`) dan menghentikan aturan berikutnya (`L`).

10. **Bagian aplikasi CRUD yang tepat dipindahkan ke masing-masing direktori:**
    - `config/`: Koneksi dan kredensial database (`database.php`).
    - `views/`: Komponen tampilan bersama dan halaman statis (`header.php`, `footer.php`, `dashboard.php`, `404.php`).
    - `helpers/`: Fungsi-fungsi bantuan umum seperti sanitasi output (`e()`), format mata uang, validasi email, dan flash message (`functions.php`).
    - `modules/`: Logika dan tampilan fitur spesifik berdasarkan domain, seperti modul CRUD pengguna (`list.php`, `add.php`, `edit.php`, `delete.php`).
