<?php
session_start();
require '../includes/db_mysql.php';
if (empty($_SESSION['admin_id'])) { header('Location: login.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: photos.php'); exit; }
$id = intval($_POST['id'] ?? 0);
$stmt = $pdo->prepare('SELECT filename, thumbnail FROM photos WHERE id = ?');
$stmt->execute([$id]);
$p = $stmt->fetch();
if ($p) {
  @unlink(__DIR__ . '/../uploads/' . $p['filename']);
  @unlink(__DIR__ . '/../uploads/' . $p['thumbnail']);
  $pdo->prepare('DELETE FROM photos WHERE id = ?')->execute([$id]);
}
header('Location: photos.php');
?>