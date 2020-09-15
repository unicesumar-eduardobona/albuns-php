<?php
namespace App;

use Dados\Albuns;
use Dados\Estilos;
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
        $this->verificaLogin();

        $estilo_escolhido = isset($_GET['estilo']) ? (int) $_GET['estilo'] : null;

        $estilosRepository = new Estilos();
        $estilos = $estilosRepository->listarEstilos();

        $codigo = $_GET['codigo'] ?? -1;
        $codigo = (int) $codigo;

        $albunsRepository = new Albuns();
        $album = $albunsRepository->recuperarAlbum($codigo);

        $musicasRepository = new Musicas();
        $musicas = $musicasRepository->listarMusicas($codigo);

        return [
            'estilos' => $estilos,
            'album' => $album,
            'musicas' => $musicas
        ];
    }

    private function verificaLogin()
    {
        $autenticacaoService = new \Zend\Authentication\AuthenticationService();
        if (! $autenticacaoService->hasIdentity()) {
            return header('location: login.php');
        }
    }
}