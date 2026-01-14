<?php

if( isset( $_POST[ 'Submit' ] ) ) {

    // Get input (DVWA uses REQUEST here)
    $target = $_REQUEST[ 'ip' ];

    // 1) Allowlist validation: ONLY valid IPv4/IPv6 addresses
    if (filter_var($target, FILTER_VALIDATE_IP) === false) {
        $html .= "<pre>Invalid IP address.</pre>";
        return;
    }

    // 2) Escape argument so shell metacharacters cannot be interpreted
    $safeTarget = escapeshellarg($target);

    // Determine OS and execute the ping command safely
    if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
        // Windows
        $cmd = shell_exec( 'ping ' . $safeTarget );
    }
    else {
        // *nix
        $cmd = shell_exec( 'ping -c 4 ' . $safeTarget );
    }

    // Feedback for the end user (output encoding is good practice)
    $html .= "<pre>" . htmlspecialchars($cmd ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "</pre>";
}

?>
