<?php
session_start();
include 'db_connection.php';

// Validate maker ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid maker ID.");
}

$maker_id = intval($_GET['id']);

// Fetch maker info
$maker_result = $conn->query("SELECT id, name, email, status FROM users WHERE id=$maker_id AND role='seller' AND status='approved' LIMIT 1");

if (!$maker_result || $maker_result->num_rows == 0) {
    die("Maker not found or not approved.");
}

$maker = $maker_result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($maker['name']); ?> - Maker Profile</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #fdfdfd;
      margin: 0;
      padding: 0;
    }
    header {
      background: #6c63ff;
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
    }
    .maker-info {
      text-align: center;
      margin-bottom: 40px;
    }
    .maker-info img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }
    .maker-info h2 {
      margin: 10px 0;
      color: #333;
    }
    .maker-info p {
      color: #555;
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
  <h1><?php echo htmlspecialchars($maker['name']); ?>'s Shop</h1>
  <p>Discover handmade products from this local maker</p>
</header>

<nav>
  <a href="index.php">Home</a>
  <a href="shop.php">Shop</a>
  <a href="makers.php">Makers</a>
  <a href="cart.php">🛒 Cart</a>
</nav>

<div class="container">
  <div class="maker-info">
    <img src="images/default-maker.png" alt="Maker">
    <h2><?php echo htmlspecialchars($maker['name']); ?></h2>
    <p>Email: <?php echo htmlspecialchars($maker['email']); ?></p>
  </div>

  <h2>Products by <?php echo htmlspecialchars($maker['name']); ?></h2>
  <div class="products-grid">
    <?php
    // Fetch maker's approved products
    $product_result = $conn->query("SELECT id, name, price, description FROM products WHERE seller_id=$maker_id AND status='approved' ORDER BY created_at DESC");

    if ($product_result && $product_result->num_rows > 0) {
        while ($row = $product_result->fetch_assoc()) {
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
        echo "<p>No products available from this maker yet.</p>";
    }
    ?>
  </div>
</div>

</body>
</html>
