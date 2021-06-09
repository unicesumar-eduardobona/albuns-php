<?php
namespace Controller;

use Model\Estilos;

class EstiloController
{
    public function listar()
    {
        $estilos = new Estilos();
        return $estilos->listarEstilos();
    }

    public function get($codigo)
    {
        echo "get $codigo";
    }
}
