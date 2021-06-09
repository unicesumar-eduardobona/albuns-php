<?php
namespace Model;

class Estilos
{
    public function existeEstilo($estilo_escolhido)
    {
        $conn = Connection::getInstance()->connection;
        $sql = 'SELECT cod_estilo from estilo where cod_estilo = :cod_estilo';
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
            $objeto = new Estilo($estilo);
            return $objeto->toArray();
        }, $results);

        return $results;
    }
}
