<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$currentPage = isset($page) && is_string($page) ? $page : 'home';
$navItems = [
    'home' => 'Home',
    'profile' => 'Profil',
    'contact' => 'Kontak',
    'functions' => 'Library Function',
    'user/list' => 'Data Pengguna',
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab9Web — PHP Modular</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header class="site-header">
        <p class="eyebrow">PRAKTIKUM 9 · PEMROGRAMAN WEB</p>
        <h1>Lab9Web</h1>
        <p>Modularisasi Program, Function, Template, dan Routing</p>
    </header>
    <nav class="site-nav" aria-label="Navigasi utama">
        <?php foreach ($navItems as $route => $label): ?>
            <a class="<?= $currentPage === $route ? 'active' : '' ?>"
               href="index.php?page=<?= e($route) ?>"><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>
    <main class="main-content">
