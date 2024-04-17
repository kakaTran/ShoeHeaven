<?php
    global $mysqli; // set $mysql thanh global de o dau minh cung co the goi no

    $mysqli = new mysqli("103.255.237.2","webdevel_catv","a,1Tz[9]5tE;","webdevel_catv");
    // Check connection
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }
?> 