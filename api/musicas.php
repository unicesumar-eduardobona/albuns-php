<?php
include __DIR__.'/vendor/autoload.php';

$codigo = $_GET['codigo'];

$controller = new \Controller\MusicaController();

$dados = $controller->listar($codigo);
echo json_encode($dados);
