<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Likha.ph</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
      background: url('admin.jpg') no-repeat center center fixed; /* use your workspace photo */
      background-size: cover;
    }

    .overlay {
      background: rgba(255,255,255,0.35); /* lighter overlay so background shows clearly */
      min-height: 100vh;
    }

    .admin-header {
      padding: 20px;
      text-align: center;
    }
    .admin-header h1 {
      margin: 0;
      font-size: 1.8rem;
      color: #dc3545;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    .admin-header p {
      margin: 5px 0 0;
      font-size: 1rem;
      color: #444;
    }

    nav {
      padding: 6px 12px;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 12px;
    }
    nav a {
      color: #0c0c0c;
      text-decoration: none;
      font-weight: 500;
      font-size: 1.2rem;
      padding: 8px 14px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 3px 6px rgba(0,0,0,0.2);
      transition: transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease;
    }
    nav a:hover {
      background: #dc3545;
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

    .content {
      padding: 30px 20px;
      max-width: 900px;
      margin: auto;
      text-align: center;
    }
    .content h2 {
      font-size: 1.6rem;
      margin-bottom: 15px;
    }
    .content p {
      color: #555;
      line-height: 1.5;
    }
  </style>
</head>
<body>
<div class="overlay">

  <div class="admin-header">
    <h1>Admin Dashboard - Likha.ph</h1>
    <p>Welcome, <?php echo htmlspecialchars($name); ?></p>
  </div>

  <nav>
    <a href="admin_dashboard.php">🏠 Home</a>
    <a href="manage_users.php">👥 Manage Users</a>
    <a href="manage_products.php">📦 Manage Products</a>
    <a href="reports.php">📊 Reports</a>
    <a href="logout.php">Logout</a>
  </nav>

  <!-- Exclusive content for Admin Dashboard home -->
  <section class="hero">
    <h2>System Oversight</h2>
    <p>Monitor users, manage products, and generate reports to keep Likha.ph running smoothly.</p>
  </section>

  <div class="content">
    <h2>Dashboard Overview</h2>
    <p>Here you can oversee the entire system, ensure compliance, and maintain platform integrity.</p>
  </div>
  <!-- End exclusive content -->

</div>
</body>
</html>
