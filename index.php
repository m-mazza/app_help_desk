<?php
    include_once 'includes/header.php'; 

    $email  = isset($_REQUEST['email'])  ? $_REQUEST['action'] : '';
    $senha  = isset($_REQUEST['senha'])  ? $_REQUEST['action'] : '';
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

    if($action == 'login')
    {
        require_once 'function/function_geral';
        $ret = validation($email, $senha);
        
    }

?>
<div class="container">    
    <div class="row">
        <div class="card-login">
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
<?php include 'includes/footer.php'; ?>