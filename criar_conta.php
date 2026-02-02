<?php
    $pagina_protegida = false;

    include_once 'includes/header.php'; 
    include_once 'functions/function_user.php';

    $conn = conectDB();

    $nome   = isset($_REQUEST['nome'])    ? $_REQUEST['nome']   : '';
    $email  = isset($_REQUEST['email'])   ? $_REQUEST['email']  : '';
    $senha  = isset($_REQUEST['senha'])   ? $_REQUEST['senha']  : '';
    $action = isset($_REQUEST['action'])  ? $_REQUEST['action'] : '';

    if($action == 'register')
    {
        $campos = [];
        empty($email) ? $campos[] = 'nome' : '';
        empty($email) ? $campos[] = 'email' : '';
        empty($senha) ? $campos[] = 'senha' : '';

        if(!empty($campos))
        {   
            $plural = count($campos) > 1;
            $mensagem = "Preencha o".($plural ? 's ': ' ')."campo".($plural ? 's ': ' ').implode(' e ', $campos); 
            $error_mensage = "<p class='text-danger text-center'>$mensagem</p>";
        }        
        else
        {
            // chamada da função createUser($conn, $nome, $email, $senha);
            $ret['status'] = 'false';

            if($ret['status'] == 'success')
            {
                echo 'Cria o usuário e redireciona para home.pho';
            }
            else
               echo 'Printa erro do banco ou cria uma mensagem amigável';
        }
    }

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
                            <input name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input name="senha" type="password" class="form-control" placeholder="Senha">
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