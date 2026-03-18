<?php
header('Content-Type: application/json'); // Ensure JSON response
$servername = "localhost";
$username = "root"; // Default MySQL username for WAMP
$password = ""; // Default MySQL password for WAMP
$dbname = "faq_db"; // Ensure this matches the created database name

// Suppress any PHP warnings or notices
error_reporting(0);

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Check POST data
$faqId = isset($_POST['faqId']) ? intval($_POST['faqId']) : 0;
if (!$faqId) {
    echo json_encode(["status" => "error", "message" => "Invalid FAQ ID."]);
    exit();
}

// Insert feedback
$stmt = $conn->prepare("INSERT INTO feedback (faq_id) VALUES (?)");
$stmt->bind_param("i", $faqId);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Feedback recorded!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to save feedback."]);
}

$stmt->close();
$conn->close();
?>
