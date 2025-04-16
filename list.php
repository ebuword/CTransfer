<?php
$dir = __DIR__ . '/uploads/';
$files = [];

if (is_dir($dir)) {
    foreach (scandir($dir) as $file) {
        if ($file !== '.' && $file !== '..') {
            $files[] = $file;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($files);
