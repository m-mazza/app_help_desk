<?php
$pagina_protegida = false;

include_once 'includes/header.php'; 
include_once 'functions/function_user.php';

$conn = conectDB();

$email  = isset($_REQUEST['r_email'])   ? $_REQUEST['r_email']  : '';
$senha  = isset($_REQUEST['r_senha'])   ? $_REQUEST['r_senha']  : '';
$senha  = isset($_REQUEST['r_nome'])    ? $_REQUEST['r_nome']   : '';
$action = isset($_REQUEST['action'])    ? $_REQUEST['action']   : '';

if($action == 'register')
{    
    $msg = [];
    if(empty(trim($nome)))
        $msg[] = 'Nome';
    
    if(empty(trim($email)))
        $msg[] = 'E-mail';

    if(empty(trim($senha)))
        $msg[] = 'Senha';


    if(!empty($msg))
    {   
        if(is_array($msg) && !empty($msg))
        {
            var_dump($msg);die();
            $msg_final = 'Os campos '.$msg_concat.' estão vazios.';
        }
       

        $ret = retornoMensagem(true, $msg_final);
        header('Location:criar_conta.php'.$ret);
        die();
    }
}

$error = isset($_REQUEST['error']) ? $_REQUEST['error'] : '';
$msg   = isset($_REQUEST['msg'])   ? $_REQUEST['msg']   : '';

$error_mensage = '';
if(!empty($error) && $error == true)
    $error_mensage = "<div class='text-danger text-center my-3'>$msg</div>";
?>
<div class="container">    
    <div class="row">
        <div class="card-login">
            <div class="card">
                <div class="card-header">Crie sua conta</div>
                <div class="card-body">
                    <form action="criar_conta.php" method="POST">
                        <input type="hidden" name="action" value="register">
                        <div class="form-group">
                            <input name="r_nome" type="text" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input name="r_email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input name="r_senha" type="password" class="form-control" placeholder="Senha">
                        </div>
                        <div id="error"></div>                       
                        <input type="submit" class="btn btn-lg btn-info btn-block" value="Cadastar Usuário">
                    </form>
                    <div class="text-center mt-2">
                        <a href="./" class="text-info">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>