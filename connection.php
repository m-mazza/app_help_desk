<?php

    require_once 'config.php';

    $conn = new mysqli( $global_config['db_host'], $global_config['db_user'],  $global_config['db_pass'], $global_config['db_name']);
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    

?>