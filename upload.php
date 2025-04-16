<?php
if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    exit('Dosya yüklenemedi');
}

$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) mkdir($uploadDir);

$filename = basename($_FILES['file']['name']);
$targetPath = $uploadDir . $filename;

if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
    http_response_code(200);
} else {
    http_response_code(500);
}
