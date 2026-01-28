<?php

function createChamados($conn, $titulo, $categoria, $descricao)
{
    //cria chamado    
    //data vai usar o NOW() ou coisa parecida do PHP para usar a data do momento da criação.
    /*
        INSERT INTO
        chamados
        VALUES ($titulo, $categoria, $descricao $data)
    */
}

function getChamados($conn, $fechado=false)
{

    //lista todos os chamados abertos
    // estado fechado = false é o estado padrão (pra listar tudo que está ativo), 
    // quando houver a necessidade de filtrar chamados fechados, informar true, como parâmetro da função.
    /*
        SELECT *
        FROM 
            chamados
        WHERE
            estado = !fechado
        AND deletado = 0
        ORDER BY 
            data
    */
}

function deleteChamados($conn, $id_chamado)
{
    //deleta o chamado.
    // será deleção lógica.
}