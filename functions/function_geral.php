<?php
    require_once 'function_user.php';

    //retorna a mensagem formatada para url.
    function retornoMensagem($state = false, $msg = '')
    {
        $url = '';
        if(!empty($state) && !empty($msg))
            $url = '?error='.$state.'&msg='.urlencode($msg);
               
        return $url;
    }

    //valida as credencias de login do usuário
    function validaLogin($conn, $email, $senha)
    {
        $user = getUsers($conn, $email);
        if(empty($user))
            return ['status' => 'error', 'tag' => 'danger', 'msg' => 'Credenciais Inválidas.'];
               
        if(!password_verify($senha,$user['senha_usuario']))
            return ['status' => 'error', 'tag' => 'danger', 'msg' => 'Credenciais Inválidas.'];

        session_regenerate_id(true);
        $_SESSION['autenticado'] = true;
        $_SESSION['id_usuario']  = $user['senha_usuario'];
        $_SESSION['id_tipo']     = $user['senha_usuario'];
        
        return ['status' => 'success'];
    }
?>