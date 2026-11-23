<?php
$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll();
?>
<section>
  <div class="section-header">
    <h2>Data Pengguna</h2>
    <a class="btn" href="index.php?page=user/add">+ Tambah Pengguna</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jabatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($users)): ?>
        <tr>
          <td colspan="5" style="text-align:center;">Belum ada data pengguna.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($users as $index => $row): ?>
          <tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo e($row['nama']); ?></td>
            <td><?php echo e($row['email']); ?></td>
            <td><?php echo e(ringkasTeks($row['jabatan'], 35)); ?></td>
            <td class="actions">
              <a class="btn-small" href="index.php?page=user/edit&id=<?php echo (int)$row['id']; ?>">Edit</a>
              <form method="post" action="index.php?page=user/delete" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">
                <button type="submit" class="btn-small btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</section>
