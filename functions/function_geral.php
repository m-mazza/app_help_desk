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
    function validaLogin($email, $senha)
    {
        $users_data = getUsers();
        $saida_form = [];

        if(empty($email))
            $saida_form[] = 'Email';
        
        if(empty($senha))
            $saida_form[] = 'Senha';

        if(!empty($saida_form))
        {  
            $campo_vazio = implode(' e ', $saida_form);

            if(count($saida_form) == 1)
                $mensagem = "O campo $campo_vazio está vazio.";
            else
                $mensagem = "Os campos $campo_vazio estão vazios"; 
            
            return [
                'status' => 'error',
                'tag'    => 'danger',
                'msg'    =>  $mensagem
            ];
        }

        $usuario_autenticado = false;

        foreach($users_data as $user)
        {
            if($user['email'] == $email && $user['senha'] == $senha)
            {
                session_regenerate_id(true);
                $usuario_autenticado = true;
                $_SESSION['autenticado'] = $usuario_autenticado;
                break;
            }
        }

        $status   = 'success';
        $msg      = '';
        $tag      = '';

        if(!$usuario_autenticado)
        {
            $status   = 'error';
            $tag      = 'danger';
            $msg      = "Usuário ou Senha inválidos";
        }

        return [
            'status' => $status,
            'tag'    => $tag,
            'msg'    => $msg
        ];
    }
?>