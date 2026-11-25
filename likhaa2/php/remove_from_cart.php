<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'buyer') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $cart_id = intval($_GET['id']);
    $sql = "DELETE FROM cart WHERE id=$cart_id";

    if ($conn->query($sql) === TRUE) {
        echo "Item removed from cart. <a href='cart.php'>Back to Cart</a>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid cart item ID.";
}

$conn->close();
?>
