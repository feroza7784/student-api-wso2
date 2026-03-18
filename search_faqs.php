<?php
header('Content-Type: application/json');

$searchTerm = isset($_GET['query']) ? strtolower($_GET['query']) : '';
$faqs = json_decode(file_get_contents('faqs.json'), true);

$results = array_filter($faqs, function ($faq) use ($searchTerm) {
    return strpos(strtolower($faq['question']), $searchTerm) !== false;
});

echo json_encode(array_values($results));
?>
