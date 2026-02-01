
<?php
require_once 'functions/function_geral.php';

function validaSessao($protegida = true)
{
    if ($protegida && !isset($_SESSION['autenticado'])) 
    {
        $ret = retornoMensagem(true, 'Acesso não permitido!');
        header('Location: index.php' . $ret);
        exit;
    }
}
?>