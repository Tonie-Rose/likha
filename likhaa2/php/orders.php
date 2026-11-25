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
  <title>My Orders - Likha.ph</title>
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
    table { width:100%; border-collapse:collapse; margin-top:20px; }
    th, td { border:1px solid #ccc; padding:10px; text-align:center; }
    th { background:#007bff; color:#fff; }
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
    <h2>My Orders</h2>
    <p>View the status of your past and current orders.</p>

    <table>
      <tr>
        <th>Order ID</th>
        <th>Date</th>
        <th>Items</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
      <!-- Example row -->
      <tr>
        <td>ORD001</td>
        <td>2026-02-27</td>
        <td>Handwoven Bag (1)</td>
        <td>₱500.00</td>
        <td>Shipped</td>
      </tr>
      <tr>
        <td>ORD002</td>
        <td>2026-02-20</td>
        <td>Ceramic Vase (2)</td>
        <td>₱700.00</td>
        <td>Delivered</td>
      </tr>
    </table>
  </div>

</div>
</body>
</html>
