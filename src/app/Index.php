<?php
namespace App;

class Index extends LayoutAbstract
{
    public function index()
    {
        $autenticacaoService = new \Zend\Authentication\AuthenticationService();
        if (! $autenticacaoService->hasIdentity()) {
            return header('location: login.php');
        }

        $estilo_escolhido = $_GET['estilo'] ?? null; // coalesce

        $estilosRepository = new \Dados\Estilos();
        $estilos = $estilosRepository->listarEstilos();

        $albunsRepository = new \Dados\Albuns();
        $albuns = $albunsRepository->listarAlbuns();

        return [
            'estilos' => $estilos,
            'estilo_escolhido' => $estilo_escolhido,
            'albuns' => $albuns,
        ];
    }
}