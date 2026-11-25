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
  <title>Profile - Likha.ph</title>
  <style>
    body { margin:0; font-family:'Segoe UI',sans-serif; background:url('HDP.jpg') no-repeat center center fixed; background-size:cover; color:#333; }
    .overlay { background:rgba(255,255,255,0.3); min-height:100vh; }
    .buyer-header { padding:20px; text-align:center; }
    .buyer-header h1 { margin:0; font-size:1.8rem; color:#007bff; text-shadow:1px 1px 2px rgba(0,0,0,0.2); }
    .buyer-header p { margin:5px 0 0; font-size:1rem; color:#444; }
    nav { padding:5px 10px; display:flex; justify-content:center; flex-wrap:wrap; gap:10px; }
    nav a { color:#0d0d0d; text-decoration:none; font-weight:500; font-size:1.2rem; padding:6px 12px; border-radius:6px; background:#fff; box-shadow:0 3px 6px rgba(0,0,0,0.2); transition:transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease; }
    nav a:hover { background:#007bff; color:#fff; transform:translateY(-2px); box-shadow:0 5px 10px rgba(0,0,0,0.3); }
    .content { padding:30px 20px; max-width:600px; margin:auto; }
    .content h2 { font-size:1.6rem; margin-bottom:15px; text-align:center; }
    .form-group { margin-bottom:15px; }
    label { display:block; font-weight:bold; margin-bottom:5px; }
    input, textarea { width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:1rem; }
    button { background:#007bff; color:#fff; border:none; padding:12px 20px; border-radius:6px; font-size:1rem; cursor:pointer; transition:background 0.3s ease; }
    button:hover { background:#0056b3; }
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
    <h2>Profile</h2>
    <p>Update your buyer information and account settings.</p>

    <form method="POST" action="process_profile_update.php">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>" required>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3"><?php echo htmlspecialchars($_SESSION['address'] ?? ''); ?></textarea>
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($_SESSION['phone'] ?? ''); ?>">
      </div>
      <button type="submit">Update Profile</button>
    </form>
  </div>

</div>
</body>
</html>
