<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$itemPath = $_POST['path'] ?? '';
if (empty($itemPath)) {
    http_response_code(400);
    echo json_encode(['error' => 'Item path is required']);
    exit;
}

// Güvenlik kontrolü
$itemPath = 'uploads/' . basename($itemPath);
if (!file_exists($itemPath)) {
    http_response_code(404);
    echo json_encode(['error' => 'Item not found']);
    exit;
}

// Klasör veya dosya silme
if (is_dir($itemPath)) {
    // Klasörü ve içindekileri sil
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($itemPath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($files as $file) {
        if ($file->isDir()) {
            rmdir($file->getRealPath());
        } else {
            unlink($file->getRealPath());
        }
    }
    rmdir($itemPath);
} else {
    // Dosyayı sil
    unlink($itemPath);
}

echo json_encode(['success' => true]);
?> 