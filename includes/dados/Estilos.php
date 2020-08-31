<?php

include_once "Connection.php";

class Estilos
{
    public function existeEstilo($estilo_escolhido)
    {
        $estilos = $this->listarEstilos();
        $estilos = array_map(function($estilo){
            return $estilo['estilo'];
        }, $estilos);

        if (! in_array($estilo_escolhido, $estilos) && $estilo_escolhido != null) {
            return false;
        }
        return true;
    }

    public function listarEstilos()
    {
        $conn = Connection::getInstance()->connection;
        $query = $conn->query('SELECT * from estilo');

        return $query->fetchAll();
    }
}
