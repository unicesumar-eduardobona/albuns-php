<?php

function listar_albuns()
{
    return [
        [
            'titulo' => 'Titãs',
            'descricao' => 'Ao Vivo MTV',
            'capa' => 'https://upload.wikimedia.org/wikipedia/pt/1/1d/Acustico_tit%C3%A3s.jpg',
            'estilo' => 'Rock'
        ],
        [
            'titulo' => 'Jorge Aragão',
            'descricao' => 'Ao Vivo Convida',
            'capa' => 'https://img.discogs.com/slIb4YhjLbyIlqTyz3gQhUwKXds=/fit-in/600x599/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-11120821-1510235036-7058.jpeg.jpg',
            'estilo' => 'Samba'
        ],
        [
            'titulo' => 'Adoniran Barbosa',
            'descricao' => 'Especial',
            'capa' => 'https://livreopiniaoportal.files.wordpress.com/2014/04/adoniranbarbosa.jpg',
            'estilo' => 'Samba'
        ],
        [
            'titulo' => 'Belo',
            'descricao' => 'Ao Vivo (2001)',
            'capa' => 'https://www.vagalume.com.br/belo/discografia/belo-ao-vivo.jpg',
            'estilo' => 'Pagode'
        ]
    ];
}

function recuperar_album($codigo)
{
    $albuns = listar_albuns();

    if (isset($albuns[$codigo])) {
        $album = $albuns[$codigo];
        return $album;
    }

    return false;
}