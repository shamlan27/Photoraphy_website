<?php
// submit_enquiry.php - handles enquiry form (AJAX or standard)
require 'includes/db_mysql.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405); exit;
}
$full_name = trim($_POST['full_name'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$phone = trim($_POST['phone'] ?? '');
$event_type = trim($_POST['event_type'] ?? '');
$event_date = !empty($_POST['event_date']) ? $_POST['event_date'] : NULL;
$location = trim($_POST['location'] ?? '');
$message = trim($_POST['message'] ?? '');
$attachment_path = null;

// Handle file upload if provided
if (!empty($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
  $file = $_FILES['attachment'];
  $allowed = ['jpg','jpeg','png','gif'];
  $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
  if (!in_array($ext, $allowed)) {
    // ignore invalid file
  } else {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
    $newName = uniqid('att_') . '.' . $ext;
    if (move_uploaded_file($file['tmp_name'], $uploadDir.$newName)) {
      $attachment_path = $newName;
    }
  }
}

$sql = 'INSERT INTO enquiries (full_name, email, phone, event_type, event_date, location, message, attachment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([$full_name, $email, $phone, $event_type, $event_date, $location, $message, $attachment_path]);

// Send admin notification (simple mail). For production use PHPMailer + SMTP.
$adminEmail = 'malcolm@example.com';
$subject = 'New enquiry from ' . $full_name;
$body = "You have a new enquiry.\n\nName: $full_name\nEmail: $email\nPhone: $phone\nEvent: $event_type\nDate: $event_date\nLocation: $location\nMessage:\n$message";
@mail($adminEmail, $subject, $body);

// If AJAX, return JSON
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
  header('Content-Type: application/json');
  echo json_encode(['status'=>'ok']);
} else {
  header('Location: enquiry.php?sent=1');
}
?>