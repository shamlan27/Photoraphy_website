<?php
session_start();
require '../includes/db_mysql.php';
if (empty($_SESSION['admin_id'])) { header('Location: login.php'); exit; }
$stats = [
  'photos' => $pdo->query('SELECT COUNT(*) FROM photos')->fetchColumn(),
  'enquiries' => $pdo->query('SELECT COUNT(*) FROM enquiries')->fetchColumn()
];
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin Dashboard</title><link rel="stylesheet" href="/malcolm_site/css/style.css"></head><body>
<div class="container admin">
  <h1>Admin Dashboard</h1>
  <nav class="admin-nav"><a href="dashboard.php">Dashboard</a> <a href="photos.php">Photos</a> <a href="enquiries.php">Enquiries</a> <a href="logout.php">Logout</a></nav>
  <section class="cards">
    <div class="card"><h3>Photos</h3><p><?php echo $stats['photos']; ?></p></div>
    <div class="card"><h3>Enquiries</h3><p><?php echo $stats['enquiries']; ?></p></div>
  </section>
</div>
</body></html>