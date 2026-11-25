<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("UPDATE users SET status='approved' WHERE id=$id");
}
header("Location: manage_users.php");
exit();
?>
