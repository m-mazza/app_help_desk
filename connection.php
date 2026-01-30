<?php

    require_once 'config.php';
    
    function conectDB()
    {
        global $global_config;

        $conn = new mysqli($global_config['db_host'], $global_config['db_user'], $global_config['db_pass'], $global_config['db_name']);

        if($conn->connect_error)
        {
            error_log("Erro de conexão: ". $conn->connect_error);
            return false;   
        }

        $conn->set_charset("utf8mb4");
        return $conn;
    }
?>