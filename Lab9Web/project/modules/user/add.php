<?php
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $jabatan = trim($_POST['jabatan'] ?? '');

    if ($nama === '' || $email === '' || $jabatan === '') {
        $error = 'Semua field wajib diisi.';
    } elseif (!validasiEmail($email)) {
        $error = 'Format email tidak valid.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (nama, email, jabatan) VALUES (:nama, :email, :jabatan)");
        $stmt->execute([
            ':nama' => $nama,
            ':email' => $email,
            ':jabatan' => $jabatan,
        ]);
        setFlash('sukses', 'Data pengguna berhasil ditambahkan.');
        header('Location: index.php?page=user/list');
        exit;
    }
}
?>
<section>
  <h2>Tambah Pengguna Baru</h2>
  <?php if ($error !== ''): ?>
    <div class="alert alert-error"><?php echo e($error); ?></div>
  <?php endif; ?>

  <form method="post" action="">
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" name="nama" value="<?php echo e($_POST['nama'] ?? ''); ?>" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo e($_POST['email'] ?? ''); ?>" required>
    </div>
    <div class="form-group">
      <label for="jabatan">Jabatan / Peran</label>
      <input type="text" id="jabatan" name="jabatan" value="<?php echo e($_POST['jabatan'] ?? ''); ?>" required>
    </div>
    <button type="submit" class="btn">Simpan</button>
    <a class="btn btn-secondary" href="index.php?page=user/list">Batal</a>
  </form>
</section>
