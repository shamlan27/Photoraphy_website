<?php require 'includes/db_mysql.php'; require 'includes/header.php'; ?>
<section class="container">
<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $pdo->prepare('SELECT * FROM photos WHERE id = ? LIMIT 1');
$stmt->execute([$id]);
$p = $stmt->fetch();
if (!$p) {
  echo '<p>Photo not found.</p>';
} else {
  echo '<article class="photo-full"><img src="uploads/'.htmlspecialchars($p['filename']).'" alt="'.htmlspecialchars($p['title']).'">';
  echo '<h1>'.htmlspecialchars($p['title']).'</h1>';
  echo '<p>'.nl2br(htmlspecialchars($p['caption'])).'</p>';
  echo '<p><a class="btn" href="enquiry.php?photo='.urlencode($p['id']).'">Enquire about this photo</a></p>';
  echo '</article>';
}
?>
</section>
<?php require 'includes/footer.php'; ?>