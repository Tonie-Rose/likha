<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password']; // plain text for now
    $role     = $_POST['role'];

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "Email already registered. <a href='register.php'>Try again</a>";
    } else {
        $sql = "INSERT INTO users (name, email, password, role, status, created_at) 
                VALUES ('$name', '$email', '$password', '$role', 'approved', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();
?>
