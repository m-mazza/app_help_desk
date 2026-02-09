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

        if(isset($user['bd_status']) && $user['bd_status'] == 'error')
            return ['status' => 'error', 'tag' => 'danger', 'msg' => 'Erro interno do servidor'];       
        
        if(!$user)
            return ['status' => 'error', 'tag' => 'danger', 'msg' => 'Credenciais Inválidas.'];
        
        if(!password_verify($senha,$user['senha_usuario']))
            return ['status' => 'error', 'tag' => 'danger', 'msg' => 'Credenciais Inválidas.'];
        
        session_regenerate_id(true);
        $_SESSION['autenticado'] = true;
        $_SESSION['id_usuario']  = $user['id_usuario'];
        $_SESSION['id_tipo']     = $user['tipo_usuario'];
        
        return ['status' => 'success'];
    }
?>