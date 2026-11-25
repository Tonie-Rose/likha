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
  <title>My Products - Likha.ph</title>
  <style>
    body { 
      margin:0; font-family:'Segoe UI',sans-serif;
     background:url('seller.jpg') no-repeat center center fixed;
     background-size:cover; 
     color:#333; 
  }
    .overlay { 
    background:rgba(255,255,255,0.35); 
    min-height:100vh;
  }
    .seller-header { 
    padding:20px; 
    text-align:center; 
  }
    .seller-header h1 { 
    margin:0; font-size:1.8rem; 
    color:#28a745; 
    text-shadow:1px 1px 2px rgba(0,0,0,0.2); 
  }
    .seller-header p { 
      margin:5px 0 0; 
      font-size:1rem; 
      color:#444; 
  }
    nav { 
    padding:6px 12px; 
    display:flex; 
    justify-content:center; 
    flex-wrap:wrap; gap:12px; 
  }
    nav a { 
    color:#0c0c0c; 
    text-decoration:none; 
    font-weight:500; 
    font-size:1.2rem; 
    padding:8px 14px; 
    border-radius:6px; 
    background:#fff; 
    box-shadow:0 3px 6px rgba(0,0,0,0.2); 
    transition:transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease; 
  }
    nav a:hover { 
    background:#28a745; 
    color:#fff; 
    transform:translateY(-2px); 
    box-shadow:0 5px 10px rgba(0,0,0,0.3); 
  }
    .content { 
    padding:30px 20px; 
    max-width:900px; 
    margin:auto; 
  }
    .content h2 { 
    font-size:1.6rem; 
    margin-bottom:15px; 
    text-align:center; 
  }
    table { 
    width:100%; 
    border-collapse:collapse; 
    margin-top:20px; 
  }
    th, td { 
    border:1px solid #ccc; 
    padding:10px; 
    text-align:left; 
  }
    th { 
      background:#28a745; 
      color:#fff; 
    }
    
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

  <div class="content">
    <h2>My Products</h2>
    <p>Here you can view, edit, or delete your listed products.</p>

    <table>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
      <!-- Example row -->
      <tr>
        <td>Handwoven Bag</td>
        <td>₱500.00</td>
        <td>Beautifully crafted handwoven bag.</td>
        <td>
          <a href="#">Edit</a> | <a href="#">Delete</a>
        </td>
      </tr>
    </table>
  </div>

</div>
</body>
</html>
