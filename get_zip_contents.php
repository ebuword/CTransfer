<?php
header('Content-Type: application/json');

if (!extension_loaded('zip')) {
    echo json_encode(['success' => false, 'error' => 'PHP zip eklentisi yüklü değil']);
    exit;
}

if (!isset($_GET['file'])) {
    echo json_encode(['success' => false, 'error' => 'Dosya adı belirtilmedi']);
    exit;
}

$filename = $_GET['file'];
$filepath = 'uploads/' . $filename;

if (!file_exists($filepath)) {
    echo json_encode(['success' => false, 'error' => 'Dosya bulunamadı']);
    exit;
}

$zip = new ZipArchive();
if ($zip->open($filepath) !== TRUE) {
    echo json_encode(['success' => false, 'error' => 'Zip dosyası açılamadı']);
    exit;
}

$contents = [];
for ($i = 0; $i < $zip->numFiles; $i++) {
    $stat = $zip->statIndex($i);
    $contents[] = [
        'name' => $stat['name'],
        'size' => $stat['size'],
        'isDir' => substr($stat['name'], -1) === '/'
    ];
}

$zip->close();

echo json_encode(['success' => true, 'contents' => $contents]); 