<?php
session_start();
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shop - Likha.ph</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #fdfdfd;
      margin: 0;
      padding: 0;
    }
    header {
      background: #007bff;
      color: #fff;
      padding: 15px;
      text-align: center;
    }
    nav {
      background: #333;
      padding: 10px;
      text-align: center;
    }
    nav a {
      color: #fff;
      margin: 0 15px;
      text-decoration: none;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .container {
      padding: 30px;
      text-align: center;
    }
    .products-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }
    .product-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      width: 220px;
      overflow: hidden;
      text-align: center;
      transition: transform 0.2s ease;
    }
    .product-card:hover {
      transform: translateY(-5px);
    }
    .product-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .product-card .card-body {
      padding: 15px;
    }
    .product-card h5 {
      margin: 10px 0;
      font-size: 1.1rem;
      color: #333;
    }
    .product-card p {
      margin: 5px 0;
      color: #555;
    }
    .product-card a {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 15px;
      background: #28a745;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background 0.3s ease;
    }
    .product-card a:hover {
      background: #1e7e34;
    }
  </style>
</head>
<body>

<header>
  <h1>Likha.ph Shop</h1>
  <p>Discover handmade fashion from local creators</p>
</header>

<nav>
  <a href="index.php">Home</a>
  <a href="shop.php">Shop</a>
  <a href="makers.php">Makers</a>
  <a href="cart.php">🛒 Cart</a>
  <a href="buyer_login.php">Buyer Login</a>
  <a href="seller_login.php">Seller Login</a>
  <a href="admin_login.php">Admin Login</a>
</nav>

<div class="container">
  <h2>Available Products</h2>
  <div class="products-grid">
    <?php
    // Fetch approved products
    $result = $conn->query("SELECT id, name, price, description FROM products WHERE status='approved' ORDER BY created_at DESC");

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product-card'>
                    <img src='images/default.png' alt='Product'>
                    <div class='card-body'>
                      <h5>".htmlspecialchars($row['name'])."</h5>
                      <p>₱".htmlspecialchars($row['price'])."</p>
                      <a href='add_to_cart.php?id={$row['id']}'>Add to Cart</a>
                    </div>
                  </div>";
        }
    } else {
        echo "<p>No products available at the moment.</p>";
    }
    ?>
  </div>
</div>

</body>
</html>
