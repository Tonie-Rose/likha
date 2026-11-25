<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "No report selected.";
    exit();
}

$reportId = $_GET['id'];

$query = "SELECT * FROM reports WHERE report_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $reportId);
$stmt->execute();
$result = $stmt->get_result();
$report = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Report - Likha.ph</title>
  <style>
    body { font-family:'Segoe UI',sans-serif; padding:20px; background:#f9f9f9; }
    h1 { color:#dc3545; }
    .report { background:#fff; padding:20px; border-radius:8px; box-shadow:0 3px 6px rgba(0,0,0,0.2); }
  </style>
</head>
<body>
  <?php if ($report): ?>
    <div class="report">
      <h1><?php echo htmlspecialchars($report['title']); ?></h1>
      <p><strong>Date:</strong> <?php echo htmlspecialchars($report['date_generated']); ?></p>
      <p><strong>Details:</strong></p>
      <p><?php echo nl2br(htmlspecialchars($report['details'])); ?></p>
    </div>
  <?php else: ?>
    <p>Report not found.</p>
  <?php endif; ?>
</body>
</html>
