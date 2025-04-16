<?php
$response = ['success' => false];
$uploadDir = __DIR__ . '/uploads/';

if (isset($_POST['files'])) {
    $filenames = json_decode($_POST['files'], true);
    $errors = [];

    foreach ($filenames as $filename) {
        $path = realpath($uploadDir . basename($filename));
        if ($path && strpos($path, realpath($uploadDir)) === 0) {
            if (!unlink($path)) $errors[] = $filename;
        } else {
            $errors[] = $filename;
        }
    }

    $response['success'] = count($errors) === 0;
    $response['errors'] = $errors;
}

echo json_encode($response);
