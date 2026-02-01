<?php 
    session_set_cookie_params(['lifetime'=> 0,'httponly'=> true]);
    session_start();

    define('ACCESS', true); 
    
    require_once dirname(__DIR__) . '/connection.php';
    require_once dirname(__DIR__) . '/functions/function_session.php';


    $protegida = isset($pagina_protegida) ? $pagina_protegida : true;
    validaSessao($protegida);

    $logout_btn = isset($_SESSION['autenticado']) ? '<a href="log-out.php" class="text-white text-decoration-none">SAIR</a>' : '';
?>
<!DOCTYPE html>
<html lang="pt-b5">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- JavaScript -->
    <script src="assets/js/jquery-v3.6.0.js"></script>
    <script src="assets/js/bootstrap4.6.1.js"></script>
</head>
<body>

<?php 
    $endpoint = basename($_SERVER['PHP_SELF']);
    if($endpoint != 'index.php')
        include 'navbar.php';
?>
<div class="body-container">
