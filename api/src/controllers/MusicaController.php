<?php
namespace Controller;

use Model\Musicas;

class MusicaController
{
    public function listar($album)
    {
        $musicas = new Musicas();
        return $musicas->listarMusicas($album);
    }

    public function get($codigo)
    {
        echo "get $codigo";
    }
}
