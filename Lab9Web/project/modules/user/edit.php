<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([':id' => $id]);
$user = $stmt->fetch();

if (!$user) {
    setFlash('error', 'Data pengguna tidak ditemukan.');
    header('Location: index.php?page=user/list');
    exit;
}

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
        $update = $pdo->prepare("UPDATE users SET nama = :nama, email = :email, jabatan = :jabatan WHERE id = :id");
        $update->execute([
            ':nama' => $nama,
            ':email' => $email,
            ':jabatan' => $jabatan,
            ':id' => $id,
        ]);
        setFlash('sukses', 'Data pengguna berhasil diperbarui.');
        header('Location: index.php?page=user/list');
        exit;
    }
}
?>
<section>
  <h2>Edit Data Pengguna</h2>
  <?php if ($error !== ''): ?>
    <div class="alert alert-error"><?php echo e($error); ?></div>
  <?php endif; ?>

  <form method="post" action="">
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" name="nama" value="<?php echo e($_POST['nama'] ?? $user['nama']); ?>" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo e($_POST['email'] ?? $user['email']); ?>" required>
    </div>
    <div class="form-group">
      <label for="jabatan">Jabatan / Peran</label>
      <input type="text" id="jabatan" name="jabatan" value="<?php echo e($_POST['jabatan'] ?? $user['jabatan']); ?>" required>
    </div>
    <button type="submit" class="btn">Simpan Perubahan</button>
    <a class="btn btn-secondary" href="index.php?page=user/list">Batal</a>
  </form>
</section>
