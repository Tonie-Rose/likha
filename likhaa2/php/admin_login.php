<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #007bff, #6c63ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .login-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }
    .login-container h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .login-container input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }
    .login-container button {
      width: 100%;
      padding: 12px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .login-container button:hover {
      background: #0056b3;
    }
    .login-container p {
      margin-top: 15px;
      font-size: 0.9rem;
      color: #666;
    }
    .login-container a {
      color: #007bff;
      text-decoration: none;
    }
    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="admin_login_process.php" method="POST">
      <input type="email" name="email" placeholder="Admin Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p><a href="index.php">← Back to Home</a></p>
  </div>
</body>
</html>
