<?php
namespace Controller;

use Model\Albuns;

class AlbumController
{
    public function listar()
    {
        $albuns = new Albuns();
        return $albuns->listarAlbuns();
    }

    public function get($codigo)
    {
        echo "get $codigo";
    }
}
