<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'buyer') {
    header("Location: buyer_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Browse Products - Likha.ph</title>
  <style>
    body { margin:0; font-family:'Segoe UI',sans-serif; background:url('HDP.jpg') no-repeat center center fixed; background-size:cover; color:#333; }
    .overlay { background:rgba(255,255,255,0.3); min-height:100vh; }
    .buyer-header { padding:20px; text-align:center; }
    .buyer-header h1 { margin:0; font-size:1.8rem; color:#007bff; text-shadow:1px 1px 2px rgba(0,0,0,0.2); }
    .buyer-header p { margin:5px 0 0; font-size:1rem; color:#444; }
    nav { padding:5px 10px; display:flex; justify-content:center; flex-wrap:wrap; gap:10px; }
    nav a { color:#0d0d0d; text-decoration:none; font-weight:500; font-size:1.2rem; padding:6px 12px; border-radius:6px; background:#fff; box-shadow:0 3px 6px rgba(0,0,0,0.2); transition:transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease; }
    nav a:hover { background:#007bff; color:#fff; transform:translateY(-2px); box-shadow:0 5px 10px rgba(0,0,0,0.3); }
    .content { padding:30px 20px; max-width:900px; margin:auto; }
    .content h2 { font-size:1.6rem; margin-bottom:15px; text-align:center; }
    .product-list { display:flex; flex-wrap:wrap; justify-content:center; gap:20px; }
    .card { background:#fff; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); width:220px; }
    .card img { width:100%; height:150px; object-fit:cover; }
    .card .card-body { padding:15px; text-align:center; }
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

  <div class="content">
    <h2>Browse Products</h2>
    <div class="product-list">
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
    </div>
  </div>

</div>
</body>
</html>
