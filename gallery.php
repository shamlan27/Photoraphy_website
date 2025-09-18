<?php require 'includes/db_mysql.php'; require 'includes/header.php'; ?>
<?php
$host = "127.0.0.1";
$user = "root"; // change if needed
$pass = "";
$db   = "malcolm_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT filename FROM photos ORDER BY uploaded_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .gallery { display: flex; flex-wrap: wrap; justify-content: center; }
        .gallery img { width: 220px; height: auto; margin: 10px; border: 2px solid #ccc; border-radius: 6px; }
    </style>
</head>
<body>
<h2>Photo Gallery</h2>
<div class="gallery">
<?php
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<img src="uploads/thumbs/' . htmlspecialchars($row['filename']) . '" alt="">';
    }
} else {
    echo "<p>❌ No images uploaded yet.</p>";
}
?>
</div>

</body>

<?php require 'includes/footer.php'; ?>
</html>
