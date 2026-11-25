<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Likha.ph | Digital Marketplace for Local Makers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #f4f4f4;
    }

    /* HEADER */
    header {
      background: #111;
      color: #fff;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      margin: 0;
      font-size: 26px;
    }

    nav a {
      color: #fff;
      margin-left: 20px;
      text-decoration: none;
      font-size: 15px;
    }

    /* HERO */
    .hero {
      background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)),
      url("https://images.unsplash.com/photo-1520975682031-a30c1f4f06b1");
      background-size: cover;
      background-position: center;
      color: #fff;
      text-align: center;
      padding: 120px 20px;
    }

    .hero h2 {
      font-size: 42px;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 18px;
      max-width: 650px;
      margin: auto;
    }

    .hero button {
      margin-top: 25px;
      padding: 12px 30px;
      background: #e63946;
      color: #fff;
      border: none;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
    }

    /* SECTION */
    .section {
      padding: 60px 40px;
      text-align: center;
      background: #fff;
    }

    .section h2 {
      margin-bottom: 10px;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
      margin-top: 30px;
    }

    .card {
      background: #fafafa;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    /* CHATBOT */
    .chat-toggle {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #e63946;
      color: #fff;
      padding: 14px 22px;
      border-radius: 50px;
      cursor: pointer;
      font-size: 14px;
      z-index: 1000;
    }

    .chatbot {
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 320px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      display: none;
      flex-direction: column;
      z-index: 1000;
    }

    .chat-header {
      background: #111;
      color: #fff;
      padding: 12px;
      border-radius: 10px 10px 0 0;
      font-size: 14px;
    }

    .chat-body {
      padding: 10px;
      height: 280px;
      overflow-y: auto;
      font-size: 14px;
    }

    .chat-footer {
      display: flex;
      border-top: 1px solid #ccc;
    }

    .chat-footer input {
      flex: 1;
      padding: 10px;
      border: none;
      outline: none;
    }

    .chat-footer button {
      background: #e63946;
      color: #fff;
      border: none;
      padding: 10px 14px;
      cursor: pointer;
    }
  </style>
</head>

<body>

<header>
  <h1>Likha.ph</h1>
  <nav>
    <a href="#">Home</a>
    <a href="#">Shop</a>
    <a href="#">Sell on Likha</a>
    <a href="#">Login</a>
  </nav>
</header>

<section class="hero">
  <h2>Celebrate Filipino Craftsmanship</h2>
  <p>Discover, support, and shop authentic locally made fashion from Filipino designers, weavers, and artisans.</p>
  <button>Shop Now</button>
</section>

<section class="section">
  <h2>Why Likha.ph?</h2>
  <div class="features">
    <div class="card">
      <h3>Support Local Makers</h3>
      <p>Likha.ph empowers Filipino fashion makers by giving them an online space to sell handcrafted products.</p>
    </div>
    <div class="card">
      <h3>Easy for Buyers</h3>
      <p>Browse, search, and purchase locally made fashion products through a user-friendly interface.</p>
    </div>
    <div class="card">
      <h3>Cloud-Powered System</h3>
      <p>Secure cloud storage ensures real-time access, availability, and safe handling of transactions.</p>
    </div>
  </div>
</section>

<!-- CHATBOT BUTTON -->
<div class="chat-toggle" onclick="toggleChat()">💬 Likha AI</div>

<!-- CHATBOT -->
<div class="chatbot" id="chatbot">
  <div class="chat-header">Likha AI Assistant</div>
  <div class="chat-body" id="chatBody">
    <p><strong>Likha AI:</strong> Hello! I’m your Likha assistant. Ask me anything about buying, selling, or how Likha.ph works.</p>
  </div>
  <div class="chat-footer">
    <input type="text" id="chatInput" placeholder="Type your question...">
    <button onclick="sendMessage()">Send</button>
  </div>
</div>

<script>
  function toggleChat() {
    const bot = document.getElementById("chatbot");
    bot.style.display = bot.style.display === "flex" ? "none" : "flex";
  }

  function sendMessage() {
    const input = document.getElementById("chatInput");
    const body = document.getElementById("chatBody");
    const message = input.value.toLowerCase();

    if (message.trim() === "") return;

    body.innerHTML += `<p><strong>You:</strong> ${input.value}</p>`;
    body.innerHTML += `<p><strong>Likha AI:</strong> ${getLikhaReply(message)}</p>`;

    input.value = "";
    body.scrollTop = body.scrollHeight;
  }

  function getLikhaReply(message) {

    if (message.includes("what is likha") || message.includes("about likha")) {
      return "Likha.ph is a digital marketplace created to support Filipino fashion makers by allowing them to sell handmade products directly to buyers online.";
    }

    if (message.includes("sell") || message.includes("seller")) {
      return "Local fashion makers can sell on Likha.ph by registering as sellers, creating a profile, and listing their handcrafted products.";
    }

    if (message.includes("register") || message.includes("sign up")) {
      return "You can register by clicking the Login or Sell on Likha button. Both buyers and sellers have dedicated account options.";
    }

    if (message.includes("buy") || message.includes("shop") || message.includes("purchase")) {
      return "Buyers can browse and purchase locally made clothing, accessories, bags, and shoes through Likha.ph.";
    }

    if (message.includes("payment")) {
      return "Likha.ph uses secure online payment methods to protect both buyers and sellers during transactions.";
    }

    if (message.includes("feature") || message.includes("system")) {
      return "The system includes seller profiles, product listings, secure payments, order management, and cloud-based data storage.";
    }

    if (message.includes("cloud")) {
      return "Cloud technology is used to securely store user, product, and transaction data while ensuring system availability.";
    }

    if (message.includes("help") || message.includes("support")) {
      return "I’m here to help! You can ask about buying, selling, registration, payments, or platform features.";
    }

    return "Likha.ph is built to promote Filipino craftsmanship and support local fashion communities. Feel free to ask me more!";
  }
</script>

</body>
</html>
