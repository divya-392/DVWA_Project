<?php

if (isset($_GET['name'])) {

    $name = $_GET['name'];

    // FIX: Encode output to prevent script execution
    $safe_name = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    echo "<pre>Hello {$safe_name}</pre>";
}

?>
