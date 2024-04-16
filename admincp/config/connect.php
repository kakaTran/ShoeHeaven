<?php
    global $mysqli; // set $mysql thanh global de o dau minh cung co the goi no

    $mysqli = new mysqli("localhost","root","","shoeheaven");

    // Check connection
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }

?>