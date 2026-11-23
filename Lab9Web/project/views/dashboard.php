<section>
  <h2>Dashboard Aplikasi</h2>
  <p>Selamat datang di aplikasi PHP Modular dengan sistem routing berbasis whitelist.</p>
  <div class="card">
    <h3>Demo Helper Function (Latihan 2)</h3>
    <ul>
      <li><strong>formatRupiah(250000):</strong> <?php echo formatRupiah(250000); ?></li>
      <li><strong>hitungDiskon(250000, 15):</strong> <?php echo formatRupiah(hitungDiskon(250000, 15)); ?></li>
      <li><strong>validasiEmail('ryan@contoh.com'):</strong> <?php echo validasiEmail('ryan@contoh.com') ? 'Valid' : 'Tidak Valid'; ?></li>
      <li><strong>ringkasTeks():</strong> <?php echo e(ringkasTeks('Modularisasi memisahkan tampilan, konfigurasi, helper, dan logika aplikasi agar mudah dipelihara.', 55)); ?></li>
    </ul>
  </div>
  <p><a class="btn" href="index.php?page=user/list">Kelola Data Pengguna &rarr;</a></p>
</section>
