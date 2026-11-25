<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Likha.ph</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f1f1f1; }
    .container { width: 400px; margin: 80px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
    h2 { text-align: center; margin-bottom: 20px; }
    input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
    button { width: 100%; padding: 12px; background: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background: #0056b3; }
    .link { text-align: center; margin-top: 15px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login to Likha.ph</h2>
    <form action="login_process.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <div class="link">
      <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
  </div>
</body>
</html>
