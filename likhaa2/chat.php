<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require "config.php";

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);
$userMessage = trim($data["message"] ?? "");

if ($userMessage === "") {
  echo json_encode(["reply" => "Please enter a message."]);
  exit;
}

// Prepare AI request
$requestData = [
  "model" => "gpt-4.1-mini",
  "input" => [
    [
      "role" => "system",
      "content" => "
You are Likha AI, the official assistant of Likha.ph.

Likha.ph is a digital marketplace designed to empower Filipino fashion makers
such as designers, weavers, shoemakers, and tailors.

Your role:
- Help buyers browse and purchase products
- Help sellers register and sell handmade items
- Explain system features and cloud technology
- Promote sustainable and local Filipino fashion

Always reply clearly, professionally, and friendly.
      "
    ],
    [
      "role" => "user",
      "content" => $userMessage
    ]
  ]
];

// Initialize cURL
$ch = curl_init("https://api.openai.com/v1/responses");

curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "Authorization: Bearer " . OPENAI_API_KEY
  ],
  CURLOPT_POSTFIELDS => json_encode($requestData)
]);

$response = curl_exec($ch);

// Error handling
if (curl_errno($ch)) {
  echo json_encode(["reply" => "AI service is currently unavailable."]);
  curl_close($ch);
  exit;
}

curl_close($ch);

// Decode AI response
$result = json_decode($response, true);
$reply = $result["output_text"] ?? "No response from AI.";

echo json_encode(["reply" => $reply]);
