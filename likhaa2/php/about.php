<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Likha.ph</title>
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f9f9f9; margin: 0; padding: 0; }
    .header {
      background: #007bff;
      color: #fff;
      padding: 20px;
      text-align: center;
      position: relative;
    }
    .header h1 { margin: 0; }
    .back-btn {
      position: absolute;
      left: 20px;
      top: 20px;
      background: #fff;
      color: #007bff;
      border: 2px solid #fff;
      padding: 8px 15px;
      border-radius: 5px;
      font-weight: bold;
      text-decoration: none;
      transition: background 0.3s ease, color 0.3s ease;
    }
    .back-btn:hover {
      background: #0056b3;
      color: #fff;
      border-color: #0056b3;
    }
    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    p {
      line-height: 1.6;
      color: #555;
      margin-bottom: 15px;
    }
    .mission, .vision {
      margin-top: 25px;
      padding: 20px;
      background: #f1f9ff;
      border-left: 5px solid #007bff;
      border-radius: 6px;
    }
    .footer {
      background: #007bff;
      color: #fff;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<div class="header">
  <a href="index.php" class="back-btn">← Back</a>
  <h1>About Likha.ph</h1>
</div>

<div class="container">
  <h2>Who We Are</h2>
  <p>
    Likha.ph is a digital marketplace dedicated to empowering Filipino artisans, makers, and entrepreneurs. 
    Our platform connects local creators with buyers who value authenticity, craftsmanship, and cultural identity.
  </p>

  <div class="mission">
    <h3>Our Mission</h3>
    <p>
      To provide a sustainable online space where Filipino makers can showcase their products, 
      expand their reach, and thrive in the digital economy while preserving cultural heritage.
    </p>
  </div>

  <div class="vision">
    <h3>Our Vision</h3>
    <p>
      To become the leading marketplace for handmade and homegrown products in the Philippines, 
      fostering pride in local craftsmanship and building meaningful connections between creators and communities.
    </p>
  </div>

  <h2>Why Choose Likha.ph?</h2>
  <p>
    ✔ Authentic Filipino products<br>
    ✔ Secure and user-friendly platform<br>
    ✔ Support for local communities<br>
    ✔ Transparent and fair marketplace practices
  </p>
</div>

<div class="footer">
  <p>&copy; <?php echo date("Y"); ?> Likha.ph — Handmade, Homegrown, Heartfelt</p>
</div>

</body>
</html>
