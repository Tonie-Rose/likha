<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connection.php'; 

// Handle form submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $body    = $conn->real_escape_string($_POST['message']);

    // Save to database (you can also send via email if configured)
    $conn->query("INSERT INTO contact_messages (name, email, subject, message) 
                  VALUES ('$name', '$email', '$subject', '$body')");

    $message = "Thank you for reaching out! We’ll get back to you soon.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Likha.ph</title>
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
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; color: #333; margin-bottom: 20px; }
    form { display: flex; flex-direction: column; gap: 15px; }
    label { font-weight: bold; color: #555; }
    input[type="text"], input[type="email"], textarea {
      padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem;
    }
    textarea { resize: vertical; min-height: 120px; }
    button {
      padding: 12px; background: #007bff; color: #fff; border: none; border-radius: 6px;
      font-size: 1rem; font-weight: bold; cursor: pointer; transition: background 0.3s ease;
    }
    button:hover { background: #0056b3; }
    .message { text-align: center; margin: 15px 0; color: green; }
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
  <h1>Contact Us</h1>
</div>

<div class="container">
  <h2>We’d love to hear from you</h2>
  <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>
  <form method="POST">
    <div>
      <label for="name">Your Name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label for="email">Your Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div>
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" required>
    </div>
    <div>
      <label for="message">Message</label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <button type="submit">Send Message</button>
  </form>
</div>

<div class="footer">
  <p>&copy; <?php echo date("Y"); ?> Likha.ph — Handmade, Homegrown, Heartfelt</p>
</div>

</body>
</html>
