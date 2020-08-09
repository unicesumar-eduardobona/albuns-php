<?php

function retornar_titulo()
{
    return "Usando PHP";
}

function retornar_subtitulo()
{
    return "Primeira tela PHP+HTML";
}

function listar_estilos()
{
    return ['Samba', 'Pop Rock'];
}

function listar_albuns()
{
    return [
        [
            'titulo' => 'Skank',
            'descricao' => 'Skank 91',
            'capa' => 'http://www.skank.com.br/wp-content/uploads/2014/08/2012-CAPA-SKANK91-320x320.jpg',
            'duracao' => '9 mins',
            'estilo' => 'Pop Rock'
        ],
        [
            'titulo' => 'Jorge Aragão',
            'descricao' => 'Samba Book',
            'capa' => 'https://images-submarino.b2w.io/produtos/01/00/item/129134/7/129134780_1GG.jpg',
            'duracao' => '11 mins',
            'estilo' => 'Samba'
        ],
        [
            'titulo' => 'Adoniran Barbosa',
            'descricao' => 'Saudosa Maloca',
            'capa' => 'https://conteudo.imguol.com.br/c/entretenimento/2013/11/28/capa-de-saudosa-malocasamba-do-arnesto-1955-de-adoniran-barbosa-1385677789479_300x300.jpg',
            'duracao' => '15 mins',
            'estilo' => 'Samba'
        ]
    ];
}

function recuperar_album($codigo)
{
    $albuns = listar_albuns();

    if (isset($albuns[$codigo])) {
        $album = $albuns[$codigo];
        return $album;
    } else {
        return false;
    }


}