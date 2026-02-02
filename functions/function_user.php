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
        return "ERRO: ".mysqli_error($conn); 
    
}   

