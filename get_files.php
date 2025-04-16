<?php
header('Content-Type: application/json');

try {
    // Zip eklentisinin yüklü olup olmadığını kontrol et
    if (!extension_loaded('zip')) {
        throw new Exception('PHP zip eklentisi yüklü değil. Lütfen PHP zip eklentisini yükleyin.');
    }

    $baseDir = 'uploads/';
    $baseDir = realpath($baseDir) ?: $baseDir;

    // Uploads dizini yoksa oluştur
    if (!is_dir($baseDir)) {
        if (!mkdir($baseDir, 0777, true)) {
            throw new Exception('Uploads dizini oluşturulamadı. Dizin yazma izinlerini kontrol edin.');
        }
    }

    // Dizin yazılabilir mi kontrol et
    if (!is_writable($baseDir)) {
        throw new Exception('Uploads dizini yazılabilir değil. Dizin izinlerini kontrol edin.');
    }

    $files = [];
    $folders = [];

    // Dizini tara
    $items = scandir($baseDir);
    if ($items === false) {
        throw new Exception('Dizin okunamadı. Dizin izinlerini kontrol edin.');
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        
        $itemPath = $baseDir . DIRECTORY_SEPARATOR . $item;
        
        if (is_dir($itemPath)) {
            $folders[] = [
                'name' => $item,
                'type' => 'folder'
            ];
        } else {
            $fileSize = @filesize($itemPath);
            if ($fileSize === false) {
                continue;
            }
            
            $fileInfo = [
                'name' => $item,
                'size' => $fileSize,
                'type' => 'file'
            ];

            // Zip dosyası ise içeriğini al
            $extension = strtolower(pathinfo($item, PATHINFO_EXTENSION));
            if ($extension === 'zip') {
                try {
                    $zip = new ZipArchive;
                    if ($zip->open($itemPath) === TRUE) {
                        $contents = [];
                        for ($i = 0; $i < $zip->numFiles; $i++) {
                            $filename = $zip->getNameIndex($i);
                            $fileSize = $zip->statIndex($i)['size'];
                            $isDir = substr($filename, -1) === '/';
                            
                            $contents[] = [
                                'name' => $filename,
                                'size' => $fileSize,
                                'isDir' => $isDir
                            ];
                        }
                        $zip->close();
                        $fileInfo['contents'] = $contents;
                    }
                } catch (Exception $zipError) {
                    // Zip dosyası okunamazsa hata verme, sadece içeriği boş bırak
                    $fileInfo['contents'] = [];
                }
            }
            
            $files[] = $fileInfo;
        }
    }

    echo json_encode([
        'success' => true,
        'files' => $files,
        'folders' => $folders
    ]);

} catch (Exception $e) {
    error_log('CTransfer Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?> 