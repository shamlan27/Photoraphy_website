<?php
$host = "127.0.0.1";
$user = "root"; // change if you set a password
$pass = "";
$db   = "malcolm_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $fileName = basename($_FILES["photo"]["name"]);
    $targetDir = "../uploads/";
    $thumbDir  = "../uploads/thumbs/";

    // Create dirs if not exist
    if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
    if (!is_dir($thumbDir)) mkdir($thumbDir, 0777, true);

    $targetFile = $targetDir . $fileName;
    $thumbFile  = $thumbDir . $fileName;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        // Copy to thumbs (simple duplicate, no resize)
        copy($targetFile, $thumbFile);

        // Insert into DB
        $stmt = $conn->prepare("INSERT INTO photos (filename, uploaded_at) VALUES (?, NOW())");
        $stmt->bind_param("s", $fileName);
        if ($stmt->execute()) {
            echo "✅ Upload successful!";
        } else {
            echo "❌ DB insert failed: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "❌ Upload failed.";
    }
}
?>