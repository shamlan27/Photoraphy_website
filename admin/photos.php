<?php
session_start();
require '../includes/db_mysql.php';
if (empty($_SESSION['admin_id'])) { header('Location: login.php'); exit; }
$photos = $pdo->query('SELECT p.*, c.name AS category FROM photos p LEFT JOIN categories c ON p.category_id = c.id ORDER BY uploaded_at DESC')->fetchAll();
$categories = $pdo->query('SELECT * FROM categories')->fetchAll();
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Manage Photos</title><link rel="stylesheet" href="/malcolm_site/css/style.css"></head><body>
<div class="container admin">
  <h1>Photos</h1>
  <nav class="admin-nav"><a href="dashboard.php">Dashboard</a> <a href="photos.php">Photos</a> <a href="enquiries.php">Enquiries</a> <a href="logout.php">Logout</a></nav>
  <section>
    <h2>Upload new photo</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label>Photo file<input type="file" name="photo" required accept="image/*"></label>
      <label>Title<input name="title"></label>
      <label>Caption<textarea name="caption"></textarea></label>
      <label>Category<select name="category_id"><option value="">-- none --</option><?php foreach($categories as $c) echo '<option value="'.htmlspecialchars($c['id']).'">'.htmlspecialchars($c['name']).'</option>'; ?></select></label>
      <button class="btn" type="submit">Upload</button>
    </form>
  </section>
  <section>
    <h2>Existing photos</h2>
    <div class="grid">
    <?php foreach($photos as $p): ?>
      <article class="card">
        <img src="/malcolm_site/uploads/<?php echo htmlspecialchars($p['thumbnail']); ?>" alt="">
        <h3><?php echo htmlspecialchars($p['title']); ?></h3>
        <p><?php echo htmlspecialchars($p['category']); ?></p>
        <form method="post" action="delete_photo.php" onsubmit="return confirm('Delete this photo?');">
          <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
          <button class="btn ghost" type="submit">Delete</button>
        </form>
      </article>
    <?php endforeach; ?>
    </div>
  </section>
</div>
</body></html>