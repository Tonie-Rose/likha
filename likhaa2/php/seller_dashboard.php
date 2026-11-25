<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'seller') {
    header("Location: seller_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Seller Dashboard - Likha.ph</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
      background: url('seller.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .overlay { background: rgba(255,255,255,0.35); min-height: 100vh; }
    .seller-header { padding: 20px; text-align: center; }
    .seller-header h1 { margin: 0; font-size: 1.8rem; color: #28a745; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); }
    .seller-header p { margin: 5px 0 0; font-size: 1rem; color: #444; }
    nav { padding: 6px 12px; display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; }
    nav a {
      color: #0c0c0c; text-decoration: none; font-weight: 500; font-size: 1.2rem;
      padding: 8px 14px; border-radius: 6px; background: #fff;
      box-shadow: 0 3px 6px rgba(0,0,0,0.2);
      transition: transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease;
    }
    nav a:hover { background: #28a745; color: #fff; transform: translateY(-2px); box-shadow: 0 5px 10px rgba(0,0,0,0.3); }
    .hero { text-align: center; padding: 60px 20px; }
    .hero h2 { font-size: 2rem; margin-bottom: 15px; color: #333; text-shadow: 1px 1px 3px rgba(0,0,0,0.2); }
    .hero p { font-size: 1.1rem; margin-bottom: 25px; color: #555; }
    .content { padding: 30px 20px; max-width: 900px; margin: auto; text-align: center; }
    .content h2 { font-size: 1.6rem; margin-bottom: 15px; }
    .content p { color: #555; line-height: 1.5; }
  </style>
</head>
<body>
<div class="overlay">

  <div class="seller-header">
    <h1>Seller Dashboard - Likha.ph</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['name'] ?? 'Seller'); ?></p>
  </div>

  <nav>
    <a href="seller_dashboard.php">🏠 Home</a>
    <a href="add_product.php">➕ Add Product</a>
    <a href="my_products.php">📦 My Products</a>
    <a href="sales_report.php">📊 Sales Report</a>
    <a href="seller_profile.php">👤 Profile</a>
    <a href="logout.php">Logout</a>
  </nav>

  <!-- Exclusive content for Seller Dashboard home -->
  <section class="hero">
    <h2>Empower Your Craft</h2>
    <p>Showcase your handmade products and connect with buyers who value authenticity.</p>
  </section>

  <div class="content">
    <h2>Dashboard Overview</h2>
    <p>Here you can manage your products, track sales, and update your profile.</p>
  </div>
  <!-- End exclusive content -->

</div>
</body>
</html>
