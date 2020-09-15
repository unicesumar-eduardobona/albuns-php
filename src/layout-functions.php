<?php

function retornar_titulo()
{
    return "Meus Álbuns Preferidos";
}

function retornar_subtitulo()
{
    return "Primeira tela PHP+HTML";
}



function criar_lista_albuns($albuns, $estilo_escolhido)
{
    foreach ($albuns as $album) {
        if ($estilo_escolhido == null || $album['estilo'] == $estilo_escolhido) {
            include __DIR__ . '/layout/templates/lista_albuns.php';
        }
    }
}