<?php
namespace App;

use Dados\Albuns;
use Dados\Estilos;
use Dados\Estrelas;
use Dados\Musicas;

class Index extends LayoutAbstract
{
    public function index()
    {
        $this->verificaLogin();

        $estilosRepository = new \Dados\Estilos();
        $estilos = $estilosRepository->listarEstilos();
        $estilo_escolhido = $_GET['estilo'] ?? null;
        if ($estilo_escolhido and !$estilosRepository->existeEstilo($estilo_escolhido)) {
            $estilo_escolhido = false;
        }

        $albunsRepository = new \Dados\Albuns();
        $albuns = $albunsRepository->listarAlbuns();

        return [
            'estilos' => $estilos,
            'estilo_escolhido' => $estilo_escolhido,
            'albuns' => $albuns,
        ];
    }

    public function ver()
    {
        $identity = $this->verificaLogin();

        $estilo_escolhido = isset($_GET['estilo']) ? (int) $_GET['estilo'] : null;

        $estilosRepository = new Estilos();
        $estilos = $estilosRepository->listarEstilos();

        $codigo = $_GET['codigo'] ?? -1;
        $codigo = (int) $codigo;

        $albunsRepository = new Albuns();
        $album = $albunsRepository->recuperarAlbum($codigo);

        $musicasRepository = new Musicas();
        $musicas = $musicasRepository->listarMusicas($codigo, $identity['cod_usuario']);

        return [
            'estilos' => $estilos,
            'album' => $album,
            'musicas' => $musicas
        ];
    }

    public function votar()
    {
        $identity = $this->verificaLogin();

        $musica = (int) $_GET['musica'];
        $voto = (int) $_GET['voto'];

        if (empty($musica) or empty($voto)) {
            // @todo tratar erro de voto
            return false;
        }

        $estrelasRepository = new Estrelas();
        $dados = [
            'cod_musica' => $musica,
            'cod_usuario' => $identity['cod_usuario'],
            'voto' => $voto
        ];
        if ($estrelasRepository->existeVoto($musica,
            $identity['cod_usuario'])) {
            $estrelasRepository->atualizarEstrela($dados);
        } else {
            $estrelasRepository->cadastrarEstrela($dados);
        }

        header('location: index.php');
    }

    private function verificaLogin()
    {
        $autenticacaoService = new \Zend\Authentication\AuthenticationService();
        if (! $autenticacaoService->hasIdentity()) {
            return header('location: login.php');
        }

        return $autenticacaoService->getIdentity();
    }
}