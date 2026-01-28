<?php
$pagina_protegida = false;
include_once 'includes/header.php'; 

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
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="validation.php" method="POST">
                        <input type="hidden" name="protegida" value="<?php echo isset($protegida) && $protegida ? '1' : '0'; ?>">
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input name="senha" type="password" class="form-control" placeholder="Senha">
                        </div>
                        <div id="error"></div>                       
                        <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
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