<?php
// includes/db_mysql.php
// PDO connection for MySQL (XAMPP)
$db_host = '127.0.0.1';
$db_name = 'malcolm_db';
$db_user = 'root';
$db_pass = '';
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
try {
  $pdo = new PDO($dsn, $db_user, $db_pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
} catch (Exception $e) {
  die('Database connection failed: ' . $e->getMessage());
}
?>