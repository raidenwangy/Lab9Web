<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/header.php';
?>
<section class="content">
  <h2>Tentang Aplikasi</h2>
  <p>Halaman ini menjelaskan tujuan aplikasi PHP Modular.</p>
  <p>Contoh pemanggilan helper di About: Suhu 30&deg;C = <strong><?php echo konversiCelciusKeFahrenheit(30); ?>&deg;F</strong></p>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
