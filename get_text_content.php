<?php
header('Content-Type: application/json');

// Güvenlik kontrolü
if (!isset($_GET['file']) || empty($_GET['file'])) {
    echo json_encode(['success' => false, 'error' => 'Dosya adı belirtilmedi']);
    exit;
}

$filename = basename($_GET['file']);
$filepath = 'uploads/' . $filename;

// Dosya uzantısı kontrolü
$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
if ($extension !== 'txt') {
    echo json_encode(['success' => false, 'error' => 'Sadece TXT dosyaları önizlenebilir']);
    exit;
}

// Dosya varlığı kontrolü
if (!file_exists($filepath)) {
    echo json_encode(['success' => false, 'error' => 'Dosya bulunamadı']);
    exit;
}

// Dosya boyutu kontrolü (max 1MB)
if (filesize($filepath) > 1024 * 1024) {
    echo json_encode(['success' => false, 'error' => 'Dosya boyutu çok büyük (max 1MB)']);
    exit;
}

try {
    // Dosya içeriğini oku
    $content = file_get_contents($filepath);
    
    // Karakter kodlamasını düzelt
    $content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content));
    
    // HTML özel karakterlerini dönüştür
    $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    
    echo json_encode([
        'success' => true,
        'content' => $content
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Dosya okunurken bir hata oluştu']);
}
?> 