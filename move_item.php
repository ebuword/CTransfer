<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$itemPath = isset($_POST['itemPath']) ? $_POST['itemPath'] : '';
$targetPath = isset($_POST['targetPath']) ? $_POST['targetPath'] : '';

if (empty($itemPath) || empty($targetPath)) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required parameters']);
    exit;
}

$baseDir = 'uploads/';
$fullItemPath = $baseDir . $itemPath;
$fullTargetPath = $baseDir . $targetPath;

// Güvenlik kontrolleri
if (strpos(realpath($fullItemPath), realpath($baseDir)) !== 0 || 
    strpos(realpath($fullTargetPath), realpath($baseDir)) !== 0) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid path']);
    exit;
}

if (!file_exists($fullItemPath)) {
    http_response_code(404);
    echo json_encode(['error' => 'Item not found']);
    exit;
}

if (!is_dir($fullTargetPath)) {
    http_response_code(400);
    echo json_encode(['error' => 'Target is not a directory']);
    exit;
}

$itemName = basename($fullItemPath);
$newPath = $fullTargetPath . '/' . $itemName;

if (rename($fullItemPath, $newPath)) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to move item']);
} 