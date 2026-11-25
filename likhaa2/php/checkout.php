<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'buyer') {
    header("Location: login.php");
    exit();
}

$buyer_id = $_SESSION['user_id'];

// Get all cart items
$result = $conn->query("SELECT * FROM cart WHERE buyer_id=$buyer_id");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_id = $row['product_id'];
        // Create order
        $conn->query("INSERT INTO orders (buyer_id, product_id, status, created_at) 
                      VALUES ($buyer_id, $product_id, 'pending', NOW())");
    }
    // Clear cart
    $conn->query("DELETE FROM cart WHERE buyer_id=$buyer_id");

    echo "Checkout complete! Your orders have been placed. <a href='orders.php'>View Orders</a>";
} else {
    echo "Your cart is empty. <a href='browse_products.php'>Browse Products</a>";
}

$conn->close();
?>
