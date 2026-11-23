<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/header.php';
?>
<section class="content">
  <h2>Pengujian Function Helper</h2>
  <ul>
    <li>Konversi 37&deg;C ke Fahrenheit: <strong><?php echo konversiCelciusKeFahrenheit(37); ?>&deg;F</strong></li>
    <li>Status Nilai 88: <strong><?php echo tentukanStatusNilai(88); ?></strong></li>
    <li>Status Nilai 65: <strong><?php echo tentukanStatusNilai(65); ?></strong></li>
    <li>Total Belanja (4 x Rp 15.000): <strong><?php echo formatRupiah(hitungTotal(15000, 4)); ?></strong></li>
  </ul>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
