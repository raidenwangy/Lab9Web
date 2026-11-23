<?php
$currentPage = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi PHP Modular & Routing</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Sistem Manajemen Pengguna</h1>
      <p>Praktikum 9 - PHP Modular, Function, Template &amp; Routing</p>
    </header>
    <nav>
      <a href="index.php?page=dashboard" class="<?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">Dashboard</a>
      <a href="index.php?page=profil" class="<?php echo $currentPage === 'profil' ? 'active' : ''; ?>">Profil</a>
      <a href="index.php?page=kontak" class="<?php echo $currentPage === 'kontak' ? 'active' : ''; ?>">Kontak</a>
      <a href="index.php?page=user/list" class="<?php echo str_starts_with($currentPage, 'user/') ? 'active' : ''; ?>">Data Pengguna (CRUD)</a>
    </nav>
    <main>
      <?php tampilkanFlash(); ?>
