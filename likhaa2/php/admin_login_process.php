<?php
session_start();
include 'db_connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND role='admin' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name']    = $user['name'];
    $_SESSION['role']    = $user['role'];
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "Invalid admin credentials. <a href='admin_login.php'>Try again</a>";
}
$conn->close();
?>
