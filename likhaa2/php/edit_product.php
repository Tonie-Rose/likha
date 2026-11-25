<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "No product selected.";
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, status=? WHERE product_id=?");
    $stmt->bind_param("sdsi", $name, $price, $status, $id);
    $stmt->execute();

    header("Location: manage_products.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Product - Likha.ph</title>
</head>
<body>
  <h1>Edit Product</h1>
  <form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>
    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br><br>
    <label>Status:</label>
    <select name="status">
      <option value="Pending" <?php if($product['status']=='Pending') echo 'selected'; ?>>Pending</option>
      <option value="Approved" <?php if($product['status']=='Approved') echo 'selected'; ?>>Approved</option>
    </select><br><br>
    <button type="submit">Save Changes</button>
  </form>
</body>
</html>
