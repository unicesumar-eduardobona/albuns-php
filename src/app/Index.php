<?php
namespace App;

use Dados\Albuns;
use Dados\Estilo;
use Dados\Estilos;
use Dados\Estrelas;
use Dados\Musicas;

class Index extends LayoutAbstract
{
    public function index()
    {
//        $this->verificaLogin();

//         mover para API
//        $estilosRepository = new \Dados\Estilos();
//        $estilos = $estilosRepository->listarEstilos();

        // substituir por api
        $estilosJson = file_get_contents('http://apache/api/estilos.php');
        $estilos = json_decode($estilosJson, true);
        $estilos = array_map(function($estilo) {
            return new Estilo($estilo);
        }, $estilos);

        $estilo_escolhido = $_GET['estilo'] ?? null;

        $existeEstilo = array_filter($estilos, function(Estilo $item) use($estilo_escolhido) {
            return ($estilo_escolhido == $item->getCodEstilo());
        });

        // rever uso deste código para não usar o banco de dados
//        if ($estilo_escolhido and !$estilosRepository->existeEstilo($estilo_escolhido)) {
//            $estilo_escolhido = false;
//        }

        $estiloInformadoInexistente = ($estilo_escolhido and !$existeEstilo);
        if ($estiloInformadoInexistente) {
            $estilo_escolhido = false;
        }

        // mover para API
//        $albunsRepository = new \Dados\Albuns();
//        $albuns = $albunsRepository->listarAlbuns();

        $albunsJson = '[{"cod_estilo":"1","0":"1","cod_album":"4","1":"4","titulo":"Tit\u00e3s","2":"Tit\u00e3s","subtitulo":"Ao Vivo MTV","3":"Ao Vivo MTV","url_capa":"https:\/\/upload.wikimedia.org\/wikipedia\/pt\/1\/1d\/Acustico_tit%C3%A3s.jpg","4":"https:\/\/upload.wikimedia.org\/wikipedia\/pt\/1\/1d\/Acustico_tit%C3%A3s.jpg","estilo":"Rock","5":"Rock"},{"cod_estilo":"4","0":"4","cod_album":"1","1":"1","titulo":"Jorge Arag\u00e3o","2":"Jorge Arag\u00e3o","subtitulo":"Ao Vivo Convida","3":"Ao Vivo Convida","url_capa":"https:\/\/img.discogs.com\/slIb4YhjLbyIlqTyz3gQhUwKXds=\/fit-in\/600x599\/filters:strip_icc():format(jpeg):mode_rgb():quality(90)\/discogs-images\/R-11120821-1510235036-7058.jpeg.jpg","4":"https:\/\/img.discogs.com\/slIb4YhjLbyIlqTyz3gQhUwKXds=\/fit-in\/600x599\/filters:strip_icc():format(jpeg):mode_rgb():quality(90)\/discogs-images\/R-11120821-1510235036-7058.jpeg.jpg","estilo":"Samba","5":"Samba"},{"cod_estilo":"1","0":"1","cod_album":"5","1":"5","titulo":"Renato Russo","2":"Renato Russo","subtitulo":"Presente","3":"Presente","url_capa":"http:\/\/renatorusso.com.br\/wp-content\/uploads\/2016\/03\/presente.jpg","4":"http:\/\/renatorusso.com.br\/wp-content\/uploads\/2016\/03\/presente.jpg","estilo":"Rock","5":"Rock"},{"cod_estilo":"4","0":"4","cod_album":"2","1":"2","titulo":"Adoniran Barbosa","2":"Adoniran Barbosa","subtitulo":"Especial","3":"Especial","url_capa":"https:\/\/livreopiniaoportal.files.wordpress.com\/2014\/04\/adoniranbarbosa.jpg","4":"https:\/\/livreopiniaoportal.files.wordpress.com\/2014\/04\/adoniranbarbosa.jpg","estilo":"Samba","5":"Samba"},{"cod_estilo":"2","0":"2","cod_album":"3","1":"3","titulo":"Belo","2":"Belo","subtitulo":"Ao Vivo (2001)","3":"Ao Vivo (2001)","url_capa":"https:\/\/www.vagalume.com.br\/belo\/discografia\/belo-ao-vivo.jpg","4":"https:\/\/www.vagalume.com.br\/belo\/discografia\/belo-ao-vivo.jpg","estilo":"Pagode","5":"Pagode"}]';
        $albuns = json_decode($albunsJson, true);

        return [
            'estilos' => $estilos,
            'estilo_escolhido' => $estilo_escolhido,
            'albuns' => $albuns,
        ];
    }

    public function ver()
    {
        $estilo_escolhido = isset($_GET['estilo']) ? (int) $_GET['estilo'] : null;

        $estilosJson = file_get_contents('http://apache/api/estilos.php');
        $estilos = json_decode($estilosJson, true);
        $estilos = array_map(function($estilo) {
            return new Estilo($estilo);
        }, $estilos);

        $codigo = $_GET['codigo'] ?? -1;
        $codigo = (int) $codigo;

        // substituir por api
        $albumJson = file_get_contents('http://apache/api/albuns.php');
        $album = json_decode($albumJson, true);

        // substituir por api
        $musicasJson = file_get_contents('http://apache/api/musicas.php?codigo='.$codigo);
        $musicas = json_decode($musicasJson, true);

        return [
            'estilos' => $estilos,
            'album' => $album,
            'musicas' => $musicas
        ];
    }

    public function votar()
    {
        return false;

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
