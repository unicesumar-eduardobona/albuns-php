<?php
namespace Dados;

class Estrelas
{
    public function existeVoto($musica, $usuario)
    {
        $conn = Connection::getInstance()->connection;
        $sql = 'SELECT cod_usuario, cod_musica from estrela 
            where cod_musica = :cod_musica and cod_usuario = :cod_usuario';
        $sth = $conn->prepare($sql);
        $sth->execute([
            ':cod_musica' => $musica,
            ':cod_usuario' => $usuario
        ]);

        if($sth->rowCount()){
            return true;
        }
        return false;
    }

    public function cadastrarEstrela(array $dados)
    {
        $conn = Connection::getInstance()->connection;
        $sql = "INSERT INTO estrela (cod_musica, cod_usuario, voto)
            VALUES (:cod_musica, :cod_usuario, :voto)";
        $sth = $conn->prepare($sql);
        $sth->execute($this->prepareDados($dados));

        return true;
    }

    public function atualizarEstrela($dados)
    {
        $conn = Connection::getInstance()->connection;
        $sql = "UPDATE estrela SET voto = :voto
            WHERE cod_musica = :cod_musica
            and cod_usuario = :cod_usuario";
        $sth = $conn->prepare($sql);

        $sth->execute($this->prepareDados($dados));
        return true;
    }

    private function prepareDados($dados)
    {
        $usuario = $dados['cod_usuario'] ?? null;
        $musica = $dados['cod_musica'] ?? null;
        $voto = $dados['voto'] ?? 0;

        if (!$usuario or !$musica) {
            // @todo tratar mensagem de erro
            return false;
        }

        return [
            ':cod_musica' => $musica,
            ':cod_usuario' => $usuario,
            ':voto' => $voto
        ];
    }

    private function prepareSqlInsertUpdate($sql)
    {

    }
}