<?php
    session_start();
    
    require_once 'connection.php'; 
    require_once 'functions/function_session.php';
    require_once 'functions/function_geral.php';
    require_once 'functions/function_user.php'; 
    
    if(!isset($_REQUEST['protegida']) || $_REQUEST['protegida'] == 1)
        $protegida = true;
    else
        $protegida = false;
    
    validaSessao($protegida);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
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

                $ret = retornoMensagem(true, 'Campo '.$key.' está vazio.');
                header('Location:index.php'.$ret);
                exit;
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
                    
            $ret = retornoMensagem(true, $erro_compo_txt);
            header('Location: index.php'.$ret);
            exit;
        }

        header('Location: home.php');
        exit;
    }
    else 
    {   
        // não permite acesso via url
        header('Location: index.php');
        exit;
    }

?>