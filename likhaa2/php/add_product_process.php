<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'seller') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seller_id   = $_SESSION['user_id'];
    $name        = $_POST['name'];
    $price       = $_POST['price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO products (seller_id, name, price, description, status, created_at) 
            VALUES ($seller_id, '$name', '$price', '$description', 'pending', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully (pending approval). <a href='my_products.php'>View My Products</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
