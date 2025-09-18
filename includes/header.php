<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Malcolm Lismore Photography</title>
  <link rel="stylesheet" href="/malcolm_site/css/style.css">
</head>
<body>
<header class="site-header">
  <header>
  <nav class="navbar">
    <ul>
      <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a></li>
      <li><a href="about.php" class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>">About</a></li>
      <li><a href="gallery.php" class="<?= basename($_SERVER['PHP_SELF']) == 'gallery.php' ? 'active' : '' ?>">Gallery</a></li>
      <li><a href="pricing.php" class="<?= basename($_SERVER['PHP_SELF']) == 'pricing.php' ? 'active' : '' ?>">Prices</a></li>
      <li><a href="enquiry.php" class="<?= basename($_SERVER['PHP_SELF']) == 'enquiry.php' ? 'active' : '' ?>">Contact</a></li>
      <li><a href="admin/login.php" class="<?= basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : '' ?>">Admin</a></li>
    </ul>
  </nav>
</header>
    <button id="navToggle" class="nav-toggle">☰</button>
  </div>


</header>
<main>
