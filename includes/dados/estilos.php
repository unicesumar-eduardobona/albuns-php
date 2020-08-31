<?php

function existe_estilo($estilo_escolhido)
{
    $estilos = listar_estilos();
    $estilos = array_map(function($estilo){
        return $estilo['estilo'];
    }, $estilos);

    if (! in_array($estilo_escolhido, $estilos) && $estilo_escolhido != null) {
        return false;
    }
    return true;

//    $estilos = listar_estilos();
//    if (! in_array($estilo_escolhido, $estilos) && $estilo_escolhido != null) {
//        return false;
//    }
//    return true;
}

function listar_estilos()
{
    $conn = get_connection();
    $query = $conn->query('SELECT * from estilo');

    return $query->fetchAll();
//    return ['Samba', 'Rock', 'Pagode'];
}

// o retorno agora deixará de ser:
// ['Samba', 'Rock', 'Pagode'] que seria equivalente a:
//
//array(3) {
//    [0] => string(5) "Samba"
//    [1] => string(4) "Rock"
//    [2] => string(6) "Pagode"
//}
//
// e passará a ser:
//
//array(3) {
//    [0] => array(4) {
//        ["cod_estilo"]=>string(1) "0"
//        [0]=>string(1) "0"
//        ["estilo"]=>
//        string(5) "Samba"
//        [1]=>string(5) "Samba"
//    }
//    [1]=>array(4) {
//        ["cod_estilo"]=>string(1) "1"
//        [0]=>string(1) "1"
//        ["estilo"]=>string(4) "Rock"
//        [1]=>string(4) "Rock"
//    }
//    [2]=>array(4) {
//        ["cod_estilo"]=>string(1) "2"
//        [0]=>string(1) "2"
//        ["estilo"]=>string(6) "Pagode"
//        [1]=>string(6) "Pagode"
//    }
//}