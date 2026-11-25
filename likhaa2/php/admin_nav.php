<?php
// Safe session start (only if not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Navigation - Likha.ph</title>
  <style>
    body { margin: 0; font-family: Arial, sans-serif; }
    .admin-header { background: #dc3545; color: #fff; padding: 15px; text-align: center; }
    nav { background: #333; padding: 10px; display: flex; justify-content: center; }
    nav a { color: #fff; margin: 0 15px; text-decoration: none; font-weight: bold; }
    nav a:hover { text-decoration: underline; }
  </style>
</head>
<body>

<div class="admin-header">
  <h1>Admin Panel - Likha.ph</h1>
  <p>Welcome, <?php echo htmlspecialchars($_SESSION['name'] ?? 'Admin'); ?> (Admin)</p>
</div>

<nav>
  <a href="admin_dashboard.php">Dashboard</a>
  <a href="manage_users.php">Manage Users</a>
  <a href="manage_products.php">Manage Products</a>
  <a href="reports.php">Reports</a>
  <a href="settings.php">Settings</a>
  <a href="logout.php">Logout</a>
</nav>
