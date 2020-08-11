<?php

function retornar_titulo()
{
    return "Meus Álbuns Preferidos";
}

function retornar_subtitulo()
{
    return "Primeira tela PHP+HTML";
}

function criar_jumbotron($titulo, $descricao, array $estilos, $escolha = null)
{
    include __DIR__ . '/layout/templates/jumbotron.php';
}

function criar_lista_albuns($albuns, $estilo_escolhido)
{
    foreach ($albuns as $codigo => $album) {
        if ($estilo_escolhido == null || $album['estilo'] == $estilo_escolhido) {
            include __DIR__ . '/layout/templates/lista_albuns.php';
        }
    }
}