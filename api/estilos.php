<?php
include __DIR__.'/vendor/autoload.php';

$codigo = $_GET['codigo'];

$controller = new \Controller\EstiloController();

if (is_null($codigo)) {
    $dados = $controller->listar();

    echo json_encode($dados);
}