<?php

if (isset($_POST['Upload'])) {

    if (!isset($_FILES['uploaded']) || $_FILES['uploaded']['error'] !== UPLOAD_ERR_OK) {
        echo '<pre>Upload failed.</pre>';
        exit;
    }

    $tmp  = $_FILES['uploaded']['tmp_name'];
    $name = $_FILES['uploaded']['name'];

    // 1) Extension allowlist
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExt, true)) {
        echo '<pre>Only image files are allowed.</pre>';
        exit;
    }

    // 2) MIME type allowlist (server-side)
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime  = $finfo->file($tmp);

    $allowedMime = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mime, $allowedMime, true)) {
        echo '<pre>Invalid file type.</pre>';
        exit;
    }

    // 3) Verify actual image content
    if (@getimagesize($tmp) === false) {
        echo '<pre>File is not a valid image.</pre>';
        exit;
    }

    // 4) Safe random filename
    $newName = bin2hex(random_bytes(16)) . '.' . $ext;

    // 5) Destination (DVWA demo location)
    $uploadDir = __DIR__ . '/../../hackable/uploads/';
    $destPath  = $uploadDir . $newName;

    if (!move_uploaded_file($tmp, $destPath)) {
        echo '<pre>Could not save uploaded file.</pre>';
        exit;
    }

    echo '<pre>File uploaded safely as: ' . htmlspecialchars($newName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</pre>';
}

?>
