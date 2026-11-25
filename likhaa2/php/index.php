<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Likha.ph - Digital Marketplace for Local Makers</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; background: #fdfdfd; color: #333; }

    /* Navbar */
    nav { background: #fff; padding: 15px 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; }
    nav .brand { font-size: 1.8rem; font-weight: bold; color: #2c3e50; text-decoration: none; }
    nav ul { list-style: none; display: flex; gap: 20px; }
    nav ul li { position: relative; }
    nav ul li a { text-decoration: none; color: #333; font-weight: 500; }
    nav ul li a:hover { color: #007bff; }

    /* Dropdown */
    .dropdown .dropbtn {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      cursor: pointer;
    }
    .dropdown .dropbtn:hover { color: #007bff; }
    .dropdown-content {
      display: none;
      position: absolute;
      background: #fff;
      min-width: 160px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      border-radius: 6px;
      z-index: 1000;
    }
    .dropdown-content a {
      color: #333;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
    }
    .dropdown-content a:hover { background: #f1f1f1; }
    .dropdown:hover .dropdown-content { display: block; }

    /* Hero Section */
    .hero {
      background: url('craft.jpg') no-repeat center center/cover;
      color: #fff;
      text-align: center;
      padding: 120px 20px;
    }
    .hero h1 { font-size: 2.8rem; margin-bottom: 20px; text-shadow: 1px 1px 3px #000; }
    .hero p { font-size: 1.2rem; margin-bottom: 30px; text-shadow: 1px 1px 2px #000; }
    .hero .btn { padding: 12px 25px; margin: 5px; font-size: 1rem; border: none; cursor: pointer; border-radius: 5px; }
    .btn-primary { background: #007bff; color: #fff; }
    .btn-secondary { background: #fff; color: #007bff; border: 2px solid #007bff; }
    .btn-primary:hover, .btn-secondary:hover { opacity: 0.9; }

    /* Categories */
    .categories { padding: 50px 20px; text-align: center; }
    .categories h2 { margin-bottom: 30px; font-size: 2rem; }
    .category-card {
      display: inline-block;
      background-size: cover;
      background-position: center;
      color: #fff;
      font-weight: bold;
      padding: 60px 20px;
      margin: 10px;
      border-radius: 8px;
      width: 200px;
      height: 150px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      text-shadow: 1px 1px 2px #000;
    }

    /* Maker Spotlight */
    .makers { background: #f1f1f1; padding: 50px 20px; text-align: center; }
    .makers h2 { margin-bottom: 30px; font-size: 2rem; }
    .maker-card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin: 10px;
      display: inline-block;
      width: 250px;
      vertical-align: top;
    }
    .maker-card img { width: 100%; height: 180px; object-fit: cover; }
    .maker-card .card-body { padding: 15px; }
    .maker-card h5 { margin-bottom: 10px; }
    .maker-card a {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 15px;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }

    /* Products */
    .products { padding: 50px 20px; text-align: center; }
    .products h2 { margin-bottom: 30px; font-size: 2rem; }
    .product-card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin: 10px;
      display: inline-block;
      width: 200px;
      vertical-align: top;
    }
    .product-card img { width: 100%; height: 180px; object-fit: cover; }
    .product-card .card-body { padding: 15px; }
    .product-card h5 { margin-bottom: 10px; }
    .product-card a {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 15px;
      background: #28a745;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }

    /* Footer */
    footer {
      background: #2c3e50;
      color: #fff;
      text-align: center;
      padding: 20px;
      margin-top: 30px;
    }
    footer a { color: #fff; text-decoration: none; margin: 0 10px; }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <a href="index.php" class="brand">Likha.ph</a>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="shop.php">Shop</a></li>
      <li><a href="makers.php">Makers</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <!-- Unified Login Dropdown -->
      <li class="dropdown">
        <a href="#" class="dropbtn">Login ▼</a>
        <div class="dropdown-content">
          <a href="buyer_login.php">Buyer Login</a>
          <a href="seller_login.php">Seller Login</a>
          <a href="admin_login.php">Admin Login</a>
        </div>
      </li>
      <li><a href="cart.php">🛒 Cart</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Discover Handmade Fashion from Local Creators</h1>
    <p>Support local makers and shop authentic Filipino fashion.</p>
    <button class="btn btn-primary" onclick="location.href='shop.php'">Shop Now</button>
    <button class="btn btn-secondary" onclick="location.href='seller_login.php'">Become a Seller</button>
  </section>

  <!-- Categories -->
  <section class="categories">
    <h2>Featured Categories</h2>
    <div class="category-card" style="background-image: url('basket.jpg');">🧺 Baskets</div>
    <div class="category-card" style="background-image: url('bggg.jpg');">👜 Bags & Shoes</div>
    <div class="category-card" style="background-image: url('bayo.jpg');">👗 Clothes</div>
    <div class="category-card" style="background-image: url('access.jpg');">🎀 Accessories</div>
  </section>

  <!-- Maker Spotlight -->
  <section class="makers">
    <h2>Maker Spotlight</h2>
    <div class="maker-card">
      <img src="images/u9gnkAerGdjVU8d1hV6Qi.jpeg" alt="Maker">
      <div class="card-body">
        <h5>Gina’s Woven Crafts</h5>
        <p>Calinog, Iloilo</p>
        <a href="maker_profile.php?id=20">View Shop</a>
      </div>
    </div>
  </section>

    <!-- Trending Products -->
  <section class="products">
    <h2>Trending Products</h2>
    <div class="product-card">
      <img src="images/prod_6928f6e467be4.png" alt="Product">
      <div class="card-body">
        <h5>Trinity Bag</h5>
        <p>₱23.00</p>
        <a href="add_to_cart.php?id=19">Add to Cart</a>
      </div>
    </div>

    <!-- Example additional product -->
    <div class="product-card">
      <img src="images/prod_sample.png" alt="Product">
      <div class="card-body">
        <h5>Handwoven Basket</h5>
        <p>₱350.00</p>
        <a href="add_to_cart.php?id=21">Add to Cart</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2026 Likha.ph | Handmade, Homegrown, Heartfelt</p>
    <p>
      <a href="terms.php">Terms</a> | 
      <a href="privacy.php">Privacy</a>
    </p>
  </footer>

</body>
</html>
