<?php
    $pagina_protegida = false;
    require_once 'includes/header.php'; 
    require_once 'functions/function_geral.php';
  
    $conn = conectDB();

    $email  = isset($_REQUEST['email'])  ? $_REQUEST['email']   : '';
    $senha  = isset($_REQUEST['senha'])  ? $_REQUEST['senha']   : '';
    $action = isset($_REQUEST['action']) ? $_REQUEST['action']  : '';

    if($action == 'login')
    {
        $campos = [];
        empty($email) ? $campos[] = 'email' : '';
        empty($senha) ? $campos[] = 'senha' : '';

        if(!empty($campos))
        {   
            $plural = count($campos) > 1;
            $mensagem = "Preencha o".($plural ? 's ': ' ')."campo".($plural ? 's ': ' ').implode(' e ', $campos); 
            $error_mensagem = "<p class='text-danger text-center'>$mensagem</p>";
        }        
        else
        {
            $ret = validaLogin($conn, $email, $senha);  
            if($ret['status'] == 'success')
            {
                header('Location:home.php');
                exit;
            }
            else
                $error_mensagem = "<p class='text-$ret[tag] text-center'>$ret[msg]</p>";
        }
    }
// echo password_hash("123", PASSWORD_DEFAULT);
?>
<div class="body-container">
    <div class="container">    
        <div class="row">
            <div class="card-login m-auto">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input name="senha" type="password" class="form-control" placeholder="Senha">
                            </div>
                            <div id="error"></div>                       
                            <button type="submit" name="action" value="login" class="btn btn-lg btn-info btn-block">Entrar</button>
                        </form>
                        <div class="text-center mt-2">
                            <a href="criar_conta.php" class="text-info">Crie a sua conta aqui.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>