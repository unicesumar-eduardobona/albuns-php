<?php
namespace Model;

class Musicas
{
    public function listarMusicas($album, $codUsuario = 1)
    {
        $conn = Connection::getInstance()->connection;
        $sql = 'SELECT musica.*, voto from musica left join estrela
            on (musica.cod_musica = estrela.cod_musica
                and estrela.cod_usuario = :cod_usuario) 
            where cod_album = :cod_album
            ';

        $sth = $conn->prepare($sql);
        $sth->execute([
            ':cod_album' => $album,
            ':cod_usuario' => $codUsuario
        ]);

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}
