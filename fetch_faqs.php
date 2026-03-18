<?php
header('Content-Type: application/json');

// Load FAQ data from the JSON file
$faqs = file_get_contents('faqs.json');

// Return the data
echo $faqs;
?>
