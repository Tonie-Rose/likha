<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password']; // plain text for now

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Store user info in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['role']    = $user['role'];

        // Redirect based on role
        if ($user['role'] == 'buyer') {
            header("Location: buyer_dashboard.php");
        } elseif ($user['role'] == 'seller') {
            header("Location: seller_dashboard.php");
        } elseif ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            // Default fallback
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Invalid email or password. <a href='login.php'>Try again</a>";
    }
}

$conn->close();
?>
