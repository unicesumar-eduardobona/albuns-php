<?php
namespace Model;

//include_once "Connection.php";

class Albuns
{
    public function listarAlbuns()
    {
        $conn = Connection::getInstance()->connection;
        $sql = 'SELECT * from album inner join estilo using (cod_estilo)
            order by rand()';
        $query = $conn->query($sql);

        return $query->fetchAll();
    }

    public function recuperarAlbum($codigo)
    {
        $codigo = (int) $codigo;

        $conn = Connection::getInstance()->connection; // única mudança
        $sql = "SELECT * from album inner join estilo using (cod_estilo) 
            where cod_album = :codigo order by rand()";
        $sth = $conn->prepare($sql);

        $sth->execute([':codigo' => $codigo]);

        if($sth->rowCount()){
            $album = $sth->fetchAll();
            return $album[0];
        }

        return false;
    }
}
