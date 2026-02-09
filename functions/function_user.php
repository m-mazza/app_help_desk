<?php

function getUsers($conn, $email)
{
    $query = sprintf("SELECT * 
            FROM usuarios
            WHERE email_usuario = '%s'", 
             mysqli_escape_string($conn, $email));

    $result = mysqli_query($conn, $query); 
    if($result != false)
        return mysqli_fetch_assoc($result);
    else
        return ['bd_status' => 'error'];

    //criar uma função de log para incluir qual é o mysqli_error($conn)
}   

function createUser($conn, $nome, $email, $senha)
{
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $query = sprintf("INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, id_tipo) 
                      VALUES ('%s', '%s', '%s', %d)",
                      mysqli_escape_string($conn, $nome),
                      mysqli_escape_string($conn, $email), 
                      mysqli_escape_string($conn, $senha_hash),
                      2);

    $result = mysqli_query($conn, $query);    
    if($result != false)
        return ['status' => 'success', 'tag' => 'success', 'msg' => 'Usuário Criado!'];
    else
        return ['status' => 'error', 'tag' => 'danger', 'msg' =>  mysqli_error($conn)];

     //criar uma função de log para incluir qual é o mysqli_error($conn)
}