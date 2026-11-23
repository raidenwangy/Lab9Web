<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/header.php';
?>
<section class="content">
  <h2>Halaman Home</h2>
  <p>Ini adalah konten khusus halaman beranda.</p>
  <p>Contoh pemanggilan helper di Home: Total belanja = <strong><?php echo formatRupiah(hitungTotal(25000, 3)); ?></strong></p>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
