<?php

function get_connection()
{
    $dbh = new PDO('mysql:host=db;dbname=albuns_php;charset=utf8', 'unicesumar', 'unicesumar');
    return $dbh;
}

include __DIR__ . '/estilos.php';
include __DIR__ . '/albuns.php';
include __DIR__ . '/musicas.php';