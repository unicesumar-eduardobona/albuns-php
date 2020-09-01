<?php

include_once "Connection.php";
include_once "Estilo.php";

class Estilos
{
    public function existeEstilo($estilo_escolhido)
    {
        $conn = Connection::getInstance()->connection;
        $sql = 'SELECT count(*) from estilo where cod_estilo = :cod_estilo';
        $sth = $conn->prepare($sql);
        $sth->execute([':cod_estilo' => $estilo_escolhido]);

        if($sth->rowCount()){
            return true;
        }
        return false;
    }

    /**
     * Retorna a lista de estilos como objeto Estilo
     *  desde que possua pelo menos um álbum e está ordenado
     *  alfabeticamente
     * 
     * @return array
     */
    public function listarEstilos()
    {
        $conn = Connection::getInstance()->connection;
        $sql = 'SELECT distinct estilo.* from estilo inner join album
            using (cod_estilo) order by estilo ';
        $query = $conn->query($sql);

        $results = $query->fetchAll();
        $results = array_map(function ($estilo) {
            return new Estilo($estilo);
        }, $results);

        return $results;
    }
}
