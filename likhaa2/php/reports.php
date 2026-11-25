<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];

// Example: fetch reports from database
$query = "SELECT * FROM reports";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reports - Likha.ph</title>
  <style>
    body { margin:0; font-family:'Segoe UI',sans-serif; background:url('admin.jpg') no-repeat center center fixed; background-size:cover; color:#333; }
    .overlay { background:rgba(255,255,255,0.35); min-height:100vh; }
    .admin-header { padding:20px; text-align:center; }
    .admin-header h1 { margin:0; font-size:1.8rem; color:#dc3545; text-shadow:1px 1px 2px rgba(0,0,0,0.2); }
    .admin-header p { margin:5px 0 0; font-size:1rem; color:#444; }
    nav { padding:6px 12px; display:flex; justify-content:center; flex-wrap:wrap; gap:12px; }
    nav a { color:#0c0c0c; text-decoration:none; font-weight:500; font-size:1.2rem; padding:8px 14px; border-radius:6px; background:#fff; box-shadow:0 3px 6px rgba(0,0,0,0.2); transition:transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease; }
    nav a:hover { background:#dc3545; color:#fff; transform:translateY(-2px); box-shadow:0 5px 10px rgba(0,0,0,0.3); }
    .content { padding:30px 20px; max-width:900px; margin:auto; }
    .content h2 { font-size:1.6rem; margin-bottom:15px; text-align:center; }
    table { width:100%; border-collapse:collapse; margin-top:20px; }
    th, td { border:1px solid #ccc; padding:10px; text-align:center; }
    th { background:#dc3545; color:#fff; }
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

  <div class="content">
    <h2>Reports</h2>
    <p>Generate and view system-wide reports on sales, activity, and performance.</p>

    <table>
      <tr>
        <th>Report ID</th>
        <th>Title</th>
        <th>Date Generated</th>
        <th>Actions</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['report_id']); ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['date_generated']); ?></td>
        <td>
          <a href="view_report.php?id=<?php echo urlencode($row['report_id']); ?>">View</a> | 
          <a href="download_report.php?id=<?php echo urlencode($row['report_id']); ?>">Download</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>

</div>
</body>
</html>
