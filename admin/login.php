<?php session_start(); require '../includes/db_mysql.php'; ?>
<?php 
$error = '';
$loginSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';
  $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ? LIMIT 1');
  $stmt->execute([$username]);
  $admin = $stmt->fetch();
  if ($admin && password_verify($password, $admin['password_hash'])) {
    $_SESSION['admin_id'] = $admin['id'];
    header('Location: dashboard.php'); exit;
  } else {
    $error = 'Invalid credentials';
  }
}
?>


<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin Login</title><link rel="stylesheet" href="/malcolm_site/css/style.css"></head><body>
<div class="container" style="max-width:420px;margin:4rem auto;">
<h1>Admin Login</h1>
<?php if ($error) echo '<div class="alert">'.htmlspecialchars($error).'</div>'; ?>
<form method="post">
  <label>Username<input name="username" required></label>
  <label>Password<input name="password" type="password" required></label>
  <button class="btn" type="submit">Login</button>
  

  <div style="margin-top:20px;">
    <a href="/malcolm_site/index.php" class="btn">← Back to Home</a>
  </div>
</div>


<script>
document.getElementById('loginForm').addEventListener('submit', function() {
  document.getElementById('loader').style.display = 'flex';
});
</script>

<!-- Success Modal -->
<div id="successModal" class="modal-overlay">
  <div class="modal-box">
    <h2>✅ Login Successful</h2>
    <p>Welcome back, admin! You're being redirected to your dashboard.</p>
    <button onclick="redirectToDashboard()" class="btn">OK</button>
  </div>
</div>


</form>


</div></body></html>

