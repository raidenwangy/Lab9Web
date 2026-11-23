<?php
function e(string $nilai): string {
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $batas = 50): string {
    if (mb_strlen($teks) <= $batas) {
        return $teks;
    }
    return mb_substr($teks, 0, $batas) . '...';
}

function setFlash(string $tipe, string $pesan): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['flash'] = [
        'tipe' => $tipe,
        'pesan' => $pesan,
    ];
}

function tampilkanFlash(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        $kelas = $flash['tipe'] === 'sukses' ? 'alert-success' : 'alert-error';
        echo '<div class="alert ' . $kelas . '">' . e($flash['pesan']) . '</div>';
    }
}
?>
