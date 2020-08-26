<?php

function listar_albuns()
{
    $conn = get_connection();
    $sql = 'SELECT * from album inner join estilo using (cod_estilo)';
    $query = $conn->query($sql);

    return $query->fetchAll();
}

function recuperar_album($codigo)
{
    $codigo = (int) $codigo;
    $conn = get_connection();
    $sql = "SELECT * from album inner join estilo using (cod_estilo)
        where cod_album = :codigo";
    $sth = $conn->prepare($sql);

    $sth->execute([':codigo' => $codigo]);

    if($sth->rowCount()){
        $album = $sth->fetchAll();
        return $album[0];
    }

    return false;
}