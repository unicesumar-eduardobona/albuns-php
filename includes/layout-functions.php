<?php

function criar_jumbotron($titulo, $descricao, array $estilos)
{
    $lista_html = '<p>';
    $lista_html .= '<a href="index.php" class="btn btn-link btn-default">Todos</a>';
    foreach ($estilos as $estilo) {
        $url = 'index.php?estilo=' . $estilo;
        $lista_html .= "<a href=\"$url\">$estilo</a>";
    }
    $lista_html .= '</p>';

    $html = '
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
                %s
            </h1>
            <p class="lead text-muted">
                %s
            </p>

            %s
        </div>
    </section>
    ';

    $html = sprintf($html, $titulo, $descricao, $lista_html);

    return $html;
}