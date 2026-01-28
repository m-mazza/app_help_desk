<?php 
    session_set_cookie_params(['lifetime'=> 0,'httponly'=> true]);
    session_start();
    require_once 'functions/function_session.php';

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
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
        <div class="logout-area"></div>
    </nav>