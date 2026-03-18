<?php
header('Content-Type: application/json');

// Get new FAQ data from POST
$newFaq = json_decode(file_get_contents('php://input'), true);

$file = 'faqs.json';
$faqs = json_decode(file_get_contents($file), true);

// Add the new FAQ to the array
$faqs[] = $newFaq;

// Save updated FAQ data
file_put_contents($file, json_encode($faqs));

// Return success response
echo json_encode(['success' => true, 'message' => 'FAQ added successfully']);
?>
