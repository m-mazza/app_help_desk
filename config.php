<?php

    require_once './functions/function_geral.php';

    if (!defined('SISTEMA_VALIDO')) 
    {
        $ret = retornoMensagem(true, 'Acesso não permitido!');
        header('Location:index.php'.$ret);
        die(); 
    }

    // array com configurações globais do sistema
    $global_config['db_name'] = "help_desk_bd";
    $global_config['db_host'] = "localhost";
    $global_config['db_user'] = "root";
    $global_config['db_pass'] = "";

?>
