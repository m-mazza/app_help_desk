<?php

require_once('../connection.php');

function getUsers()
{
    $users = [
        ['email' => 'adm@teste.com.br', 'senha' => '123'],
        ['email' => 'user@teste.com.br', 'senha' => '123']
    ];

    return $users;
}

function createUsers($conn, $nome, $email, $senha)
{
    $sql = sprintf("INSERT INTO usuarios (nome, email, senha) VALUE ('%s', '%s', '%s') ", 
    mysqli_escape_string($conn, $nome),
            mysqli_escape_string($conn, $email), 
            mysqli_escape_string($conn, $senha)
    );
    
    $result = mysqli_query($conn, $sql);

    header('Content-Type: application/json');
    
    $resposta = [];
    if($result)
    {
        $id = mysqli_insert_id($conn);

        $resposta = [
            'status' => 'success',
            'user_id' => $id,
            'message' => 'Usuário cadastrado com sucesso'
        ];

        echo json_encode($resposta);
    }
    else
    {
        $resposta = [
            'status' => 'error',
            'user_id' => NULL,
            'message' => 'Erro ao cadastrar o usuário'.mysqli_error($conn)
        ];

        echo json_encode($resposta);
    }    
}