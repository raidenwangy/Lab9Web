<?php
session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/helpers/functions.php';

$routes = [
    'dashboard'   => __DIR__ . '/views/dashboard.php',
    'profil'      => __DIR__ . '/views/profil.php',
    'kontak'      => __DIR__ . '/views/kontak.php',
    'user/list'   => __DIR__ . '/modules/user/list.php',
    'user/add'    => __DIR__ . '/modules/user/add.php',
    'user/edit'   => __DIR__ . '/modules/user/edit.php',
    'user/delete' => __DIR__ . '/modules/user/delete.php',
];

$page = $_GET['page'] ?? 'dashboard';

if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';
} else {
    $contentFile = $routes[$page];
}

// Rute aksi tanpa tampilan HTML langsung (POST/Redirect)
if ($page === 'user/delete') {
    require $contentFile;
    exit;
}

// Tangani proses POST sebelum header dikirim agar redirect header() berjalan mulus
ob_start();
require $contentFile;
$contentOutput = ob_get_clean();

require_once __DIR__ . '/views/header.php';
echo $contentOutput;
require_once __DIR__ . '/views/footer.php';
?>
