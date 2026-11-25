<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'buyer') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $buyer_id   = $_SESSION['user_id'];

    $sql = "INSERT INTO cart (buyer_id, product_id, created_at) VALUES ($buyer_id, $product_id, NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart. <a href='cart.php'>View Cart</a>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid product ID.";
}

$conn->close();
?>
