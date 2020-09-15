<?php
include __DIR__.'/vendor/autoload.php';

$controller = new App\Index();
$vars = $controller->index();
?>

<?php $controller->imprimirLayoutInicio();?>

<main role="main">

    <?=$controller->imprimirJumbotron(
        'Álbuns em Destaque',
        'Aproveite o tempo livre e curta uma boa música',
        $vars['estilos'],
        $vars['estilo_escolhido']
    )?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <?php if ($vars['estilo_escolhido'] === false): ?>
                    <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert">
                            O estilo escolhido não foi encontrado
                        </div>
                    </div>
                <?php endif;?>

                <?=$controller->imprimirListaAlbuns(
                    $vars['albuns'],
                    $vars['estilo_escolhido']
                )?>

            </div>
        </div>
    </div>

</main>

<?php $controller->imprimirLayoutTermino()?>