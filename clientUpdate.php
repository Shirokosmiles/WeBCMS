<?php
function uploadFile($apiUrl, $filePath, $uploadPath, $origin, $password) {
    $fileData = new CURLFile($filePath);
    $postFields = ['file' => $fileData, 'path' => $uploadPath];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Origin: ' . $origin,
        'Password: ' . $password
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 403) {
        echo "Access denied
";
        return null;
    }
    
    return json_decode($response, true);
}

function uploadDirectory($apiUrl, $dirPath, $origin, $password) {
    $postFields = ['dir' => $dirPath];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Origin: ' . $origin,
        'Password: ' . $password
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 403) {
        echo "Access denied
";
        return null;
    }

    return json_decode($response, true);
}

function downloadFile($apiUrl, $fileName, $savePath, $origin, $password) {
    $url = $apiUrl . '?file=' . urlencode($fileName);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Origin: ' . $origin,
        'Password: ' . $password
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 403) {
        echo "Access denied
";
        return null;
    }

    if ($httpCode === 200) {
        if (!file_exists(dirname($savePath))) {
            mkdir(dirname($savePath), 0777, true);
        }
        file_put_contents($savePath, $response);
    }

    return $httpCode;
}

function updateFile($apiUrl, $fileName, $newContent, $origin, $password) {
    $data = json_encode(['file_name' => $fileName, 'content' => $newContent]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Origin: ' . $origin,
        'Password: ' . $password
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 403) {
        echo "Access denied
";
        return null;
    }

    return json_decode($response, true);
}

function getServerFiles($apiUrl, $origin, $password) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Origin: ' . $origin,
        'Password: ' . $password
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 403) {
        echo "Access denied
";
        return null;
    }

    return json_decode($response, true);
}

$apiUrl = 'http://epicore.eu/api.php';

$origin = 'https://wow.net.kg';
$password = 'onegocms';

$currentDomain = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
if ($currentDomain !== $origin) {
    echo "Origin mismatch. No action taken.
";
    exit;
}

$serverFiles = getServerFiles($apiUrl, $origin, $password);

if (!$serverFiles) {
    exit;
}

function getFileList($dir) {
    $fileArray = array();
    foreach (glob($dir . '/*') as $file) {
        if (is_dir($file)) {
            $fileArray[] = $file;
            $fileArray = array_merge($fileArray, getFileList($file));
        } else {
            $fileArray[] = $file;
        }
    }
    return $fileArray;
}

$clientBaseDir = __DIR__;
$clientFiles = getFileList($clientBaseDir);

foreach ($serverFiles as $serverFile) {
    $clientFilePath = $clientBaseDir . '/' . $serverFile['path'];
    if (!file_exists($clientFilePath) || filemtime($clientFilePath) < $serverFile['modified']) {
        if ($serverFile['is_dir']) {
            mkdir($clientFilePath, 0777, true);
            echo "Created directory: " . $serverFile['path'] . "
";
        } else {
            downloadFile($apiUrl, $serverFile['path'], $clientFilePath, $origin, $password);
            echo "Synced file: " . $serverFile['path'] . "
";
        }
    }
}

foreach ($clientFiles as $clientFile) {
    $relativePath = str_replace($clientBaseDir . '/', '', $clientFile);

    if (is_dir($clientFile)) {
        $uploadPath = $relativePath;
        $result = uploadDirectory($apiUrl, $uploadPath, $origin, $password);
        if ($result) {
            echo "Uploaded directory: " . $relativePath . "
";
        }
    } else {
        $uploadPath = dirname($relativePath);
        $result = uploadFile($apiUrl, $clientFile, $uploadPath, $origin, $password);
        if ($result) {
            echo "Uploaded file: " . $relativePath . "
";
        }
    }
}
?>