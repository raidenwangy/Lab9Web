<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    setFlash('error', 'Metode tidak diizinkan. Gunakan tombol Hapus.');
    header('Location: index.php?page=user/list');
    exit;
}

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id > 0) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute([':id' => $id]);
    setFlash('sukses', 'Data pengguna berhasil dihapus.');
} else {
    setFlash('error', 'ID pengguna tidak valid.');
}

header('Location: index.php?page=user/list');
exit;
?>
