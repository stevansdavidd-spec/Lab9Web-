<?php
declare(strict_types=1);

require_once __DIR__ . '/helpers/functions.php';

$routes = [
    'home'          => __DIR__ . '/views/home.php',
    'profile'       => __DIR__ . '/views/profile.php',
    'contact'       => __DIR__ . '/views/contact.php',
    'functions'     => __DIR__ . '/views/functions-demo.php',
    'include-test'  => __DIR__ . '/lab/uji-include.php',
    'require-test'  => __DIR__ . '/lab/uji-require.php',
    'user/list'     => __DIR__ . '/modules/user/list.php',
    'user/add'      => __DIR__ . '/modules/user/add.php',
    'user/edit'     => __DIR__ . '/modules/user/edit.php',
    'user/delete'   => __DIR__ . '/modules/user/delete.php',
];

$page = $_GET['page'] ?? 'home';
$isValidPage = is_string($page) && array_key_exists($page, $routes);
$contentFile = $isValidPage ? $routes[$page] : __DIR__ . '/views/404.php';

if (!$isValidPage) {
    http_response_code(404);
}

require_once __DIR__ . '/views/header.php';
require $contentFile;
require_once __DIR__ . '/views/footer.php';
