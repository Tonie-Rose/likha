<?php
// Database connection settings
$servername = "localhost";   // usually localhost for XAMPP
$username   = "root";        // default XAMPP username
$password   = "";            // default XAMPP password is empty
$dbname     = "db_likha";    // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: set charset to UTF-8 for proper encoding
$conn->set_charset("utf8");
?>
