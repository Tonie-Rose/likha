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

if (!$report) {
    echo "Report not found.";
    exit();
}

// Force download as plain text file (you can change to CSV or PDF later)
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="report_' . $reportId . '.txt"');

echo "Report ID: " . $report['report_id'] . "\n";
echo "Title: " . $report['title'] . "\n";
echo "Date: " . $report['date_generated'] . "\n";
echo "Details:\n" . $report['details'] . "\n";
exit();
?>
