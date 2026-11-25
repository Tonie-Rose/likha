<?php
// Safe session start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Restrict access to buyers only
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'buyer') {
    header("Location: buyer_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buyer Dashboard - Likha.ph</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
      background: url('HDP.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .overlay {
      background: rgba(255,255,255,0.3);
      min-height: 100vh;
    }

    .buyer-header {
      padding: 20px;
      text-align: center;
    }
    .buyer-header h1 {
      margin: 0;
      font-size: 1.8rem;
      color: #007bff;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    .buyer-header p {
      margin: 5px 0 0;
      font-size: 1rem;
      color: #444;
    }

    nav {
      padding: 5px 10px;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
    }
    nav a {
      color: #0d0d0d;
      text-decoration: none;
      font-weight: 500;
      font-size: 1.2rem;
      padding: 6px 12px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 3px 6px rgba(0,0,0,0.2);
      transition: transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease;
    }
    nav a:hover {
      background: #007bff;
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 5px 10px rgba(0,0,0,0.3);
    }

    .hero {
      text-align: center;
      padding: 60px 20px;
    }
    .hero h2 {
      font-size: 2rem;
      margin-bottom: 15px;
      color: #333;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
    }
    .hero p {
      font-size: 1.1rem;
      margin-bottom: 25px;
      color: #555;
    }

    .section {
      padding: 30px 20px;
      text-align: center;
    }
    .section h3 {
      font-size: 1.6rem;
      margin-bottom: 20px;
    }
    .card {
      display: inline-block;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin: 10px;
      width: 220px;
      vertical-align: top;
    }
    .card img { width: 100%; height: 150px; object-fit: cover; }
    .card .card-body { padding: 15px; }
    .card h5 { margin-bottom: 10px; font-size: 1rem; }
    .card p { font-size: 0.9rem; color: #555; }
  </style>
</head>
<body>
<div class="overlay">

  <div class="buyer-header">
    <h1>Buyer Dashboard - Likha.ph</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['name'] ?? 'Buyer'); ?></p>
  </div>

  <nav>
    <a href="buyer_dashboard.php">🏠 Home</a>
    <a href="browse_products.php">Browse Products</a>
    <a href="cart.php">🛒 My Cart</a>
    <a href="orders.php">My Orders</a>
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
  </nav>

  <!-- Exclusive content for Buyer Dashboard home -->
  <section class="hero">
    <h2>Discover Handmade Treasures</h2>
    <p>Support local makers and shop authentic Filipino products.</p>
  </section>

  <section class="section">
    <h3>Featured Products</h3>
    <div class="card">
      <img src="images/sample_bag.jpg" alt="Bag">
      <div class="card-body">
        <h5>Handwoven Bag</h5>
        <p>₱500.00</p>
      </div>
    </div>
    <div class="card">
      <img src="images/sample_vase.jpg" alt="Vase">
      <div class="card-body">
        <h5>Ceramic Vase</h5>
        <p>₱350.00</p>
      </div>
    </div>
    <div class="card">
      <img src="images/sample_basket.jpg" alt="Basket">
      <div class="card-body">
        <h5>Bamboo Basket</h5>
        <p>₱250.00</p>
      </div>
    </div>
  </section>
  <!-- End exclusive content -->

</div>
</body>
</html>
