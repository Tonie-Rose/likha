<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Likha.ph</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f1f1f1; }
    .container { width: 450px; margin: 80px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
    h2 { text-align: center; margin-bottom: 20px; }
    input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
    button { width: 100%; padding: 12px; background: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background: #218838; }
    .link { text-align: center; margin-top: 15px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Create Your Account</h2>
    <form action="register_process.php" method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="">Select Role</option>
        <option value="buyer">Buyer</option>
        <option value="seller">Seller</option>
      </select>
      <button type="submit">Register</button>
    </form>
    <div class="link">
      <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
  </div>
</body>
</html>
