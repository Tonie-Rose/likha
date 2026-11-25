<?php
session_start();
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Makers - Likha.ph</title>
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
      text-align: center;
    }
    .makers-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }
    .maker-card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      width: 250px;
      overflow: hidden;
      text-align: center;
      transition: transform 0.2s ease;
    }
    .maker-card:hover {
      transform: translateY(-5px);
    }
    .maker-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .maker-card .card-body {
      padding: 15px;
    }
    .maker-card h5 {
      margin: 10px 0;
      font-size: 1.1rem;
      color: #333;
    }
    .maker-card p {
      margin: 5px 0;
      color: #555;
    }
    .maker-card a {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 15px;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background 0.3s ease;
    }
    .maker-card a:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

<header>
  <h1>Likha.ph Makers</h1>
  <p>Meet our local artisans and fashion creators</p>
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
  <h2>Our Makers</h2>
  <div class="makers-grid">
    <?php
    // Fetch approved sellers
    $result = $conn->query("SELECT id, name, email FROM users WHERE role='seller' AND status='approved' ORDER BY created_at DESC");

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='maker-card'>
                    <img src='images/default-maker.png' alt='Maker'>
                    <div class='card-body'>
                      <h5>".htmlspecialchars($row['name'])."</h5>
                      <p>".htmlspecialchars($row['email'])."</p>
                      <a href='maker_profile.php?id={$row['id']}'>View Shop</a>
                    </div>
                  </div>";
        }
    } else {
        echo "<p>No makers available at the moment.</p>";
    }
    ?>
  </div>
</div>

</body>
</html>
