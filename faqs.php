<?php
header("Content-Type: application/json");

$data = file_get_contents("faqs.json");
echo $data;
?>
