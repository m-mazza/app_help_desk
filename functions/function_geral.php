<?php

    function retornoMensagem($state = false, $msg = '')
    {
        $url = '';
        if(!empty($state) && !empty($msg))
            $url = '?error='.$state.'&msg='.urlencode($msg);
               
        return $url;
    }

    function validation($email, $senha)
    {

        $usuario_autenticado = false;
        $campo_err = [];
        
        $users_data = getUsers();
        
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : ''; 
        $senha = isset($_REQUEST['senha']) ? $_REQUEST['senha'] : ''; 

        $form_data = [
            "email" => $email,
            "senha" => $senha
        ];
        
        foreach($form_data as $key => $data) 
        {
            if(empty($data))
            {
                if($key == 'email')
                    $key = 'E-mail';
                if($key == 'senha')
                    $key = "Senha";

                $mensagem = 'Campo '.$key.' está vazio.';

                return [
                    'status' => 'error',
                    'tag'    => 'danger',
                    'msg'    =>  $mensagem
                ];
            }
        }
        
        foreach($users_data as $user)
        {
            if($user['email'] == $email && $user['senha'] == $senha)
            {
                session_regenerate_id(true);
                $usuario_autenticado = true;
                $_SESSION['autenticado'] = $usuario_autenticado;
                break;
            }

            if ($user['email'] == $email && $user['senha'] != $senha) 
            {
                if (!in_array('Senha', $campo_err)) 
                    $campo_err[] = 'Senha';
            }

            if ($user['senha'] == $senha && $user['email'] != $email) 
            {
                if (!in_array('E-mail', $campo_err))
                    $campo_err[] = 'E-mail';
            }
        }

        if(!$usuario_autenticado)
        {
            if(empty($campo_err))
                $erro_compo_txt = 'E-mail e Senha invalidos.';
            else
            {
                if($campo_err[0] == 'E-mail')
                    $str = 'inválido.';
                else
                    $str = 'inválida.';

                $erro_compo_txt = $campo_err[0].' '.$str;
            }
                    
            $error_mensage = "<div class='text-danger text-center my-3'>$erro_compo_txt</div>";
            exit;
        }

    }
?>