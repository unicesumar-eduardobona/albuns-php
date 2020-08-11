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
    $lista_html = '<p>';

    $class_active = ($escolha == null) ? ' active' : null;

    $lista_html .= '<a href="index.php" class="btn btn-primary btn-lg btn-outline-primary %s">Todos</a> ';
    $lista_html = sprintf($lista_html, $class_active);

    foreach ($estilos as $estilo) {
        $url = 'index.php?estilo=' . $estilo;
        $class_active = ($estilo == $escolha) ? ' active' : null;

        $lista_html .= "<a class='btn btn-primary btn-lg btn-outline-primary %s' href='%s'>%s</a> ";
        $lista_html = sprintf($lista_html, $class_active, $url, $estilo);
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