<?php
namespace App;

abstract class LayoutAbstract
{
    public function imprimirHead()
    {
        return include __DIR__ . "/../../view/layout/head.php";
    }

    public function imprimirHeader()
    {
        include __DIR__ . "/../../view/layout/header.php";
    }

    public function imprimirFooter()
    {
        include __DIR__ . "/../../view/layout/footer.php";
    }

    public function imprimirJumbotron($titulo, $descricao, array $estilos, $escolha = null)
    {
        include __DIR__ . '/../../view/layout/templates/jumbotron.php';
    }

    public function imprimirListaAlbuns($albuns, $estilo_escolhido)
    {
        foreach ($albuns as $album) {
            if ($estilo_escolhido == null || $album['estilo'] == $estilo_escolhido) {
                include __DIR__ . '/../../view/layout/templates/lista_albuns.php';
            }
        }
    }
}