<?php
// chatbot.php - AI powered chatbot for Likha.ph

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["user_message"])) {
    $userMessage = $_POST["user_message"];

    // Call AI API (example using cURL)
    $apiKey = "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"; // from Azure OpenAI or OpenAI
    $url = "https://api.openai.com/v1/chat/completions";

    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => [
            ["role" => "system", "content" => "You are Likha.ph’s assistant. You know everything about the platform, products, makers, and ordering process."],
            ["role" => "user", "content" => $userMessage]
        ]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer $apiKey"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($result, true);
    $response = $responseData["choices"][0]["message"]["content"] ?? "Sorry, I couldn’t get a response.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Likha.ph Chatbot</title>
</head>
<body>
    <form method="post">
        <input type="text" name="user_message" placeholder="Ask me anything..." required>
        <input type="submit" value="Send">
    </form>
    <?php if (!empty($response)): ?>
        <p><strong>You:</strong> <?php echo htmlspecialchars($userMessage); ?></p>
        <p><strong>Bot:</strong> <?php echo htmlspecialchars($response); ?></p>
    <?php endif; ?>
</body>
</html>
