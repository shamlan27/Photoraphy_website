<?php
session_start();
require '../includes/db_mysql.php';
if (empty($_SESSION['admin_id'])) { header('Location: login.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
  $pdo->prepare('UPDATE enquiries SET status = ? WHERE id = ?')->execute([$_POST['status'], $_POST['id']]);
}
$enquiries = $pdo->query('SELECT * FROM enquiries ORDER BY created_at DESC')->fetchAll();
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Enquiries</title><link rel="stylesheet" href="/malcolm_site/css/style.css"></head><body>
<div class="container admin">
  <h1>Enquiries</h1>
  <nav class="admin-nav"><a href="dashboard.php">Dashboard</a> <a href="photos.php">Photos</a> <a href="enquiries.php">Enquiries</a> <a href="logout.php">Logout</a></nav>
  <section>
    <?php foreach ($enquiries as $e): ?>
      <article class="enquiry">
        <h3><?php echo htmlspecialchars($e['full_name']); ?> — <small><?php echo htmlspecialchars($e['created_at']); ?></small></h3>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($e['email']); ?> <strong>Phone:</strong> <?php echo htmlspecialchars($e['phone']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($e['message'])); ?></p>
        <?php if ($e['attachment']): ?><p>Attachment: <a href="/malcolm_site/uploads/<?php echo htmlspecialchars($e['attachment']); ?>">View</a></p><?php endif; ?>
        <form method="post">
          <input type="hidden" name="id" value="<?php echo $e['id']; ?>">
          <select name="status"><option value="new" <?php if($e['status']=='new') echo 'selected'; ?>>new</option><option value="contacted" <?php if($e['status']=='contacted') echo 'selected'; ?>>contacted</option><option value="closed" <?php if($e['status']=='closed') echo 'selected'; ?>>closed</option></select>
          <button name="update_status" class="btn" type="submit">Update</button>
        </form>
      </article>
    <?php endforeach; ?>
  </section>
</div>
</body></html>