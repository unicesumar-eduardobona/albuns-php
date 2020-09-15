<?php
include __DIR__.'/vendor/autoload.php';

$index = new App\Index();
$vars = $index->index();

?>
<!doctype html>
<html lang="pt-br">

<?=$index->imprimirHead()?>

<body>

<?=$index->imprimirHeader()?>

<main role="main">

    <?=$index->imprimirJumbotron(
        'Álbuns em Destaque',
        'Aproveite o tempo livre e curta uma boa música',
        $vars['estilos'],
        $vars['estilo_escolhido']
    )?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php /*
                <?php if ($estilosRepository->existeEstilo($estilo_escolhido)===false): ?>
                    <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert">
                            O estilo escolhido não foi encontrado
                        </div>
                    </div>
                <?php endif;?>
                */?>

                <?=$index->imprimirListaAlbuns(
                    $vars['albuns'],
                    $vars['estilo_escolhido']
                )?>

            </div>
        </div>
    </div>

</main>

<?=$index->imprimirFooter()?>

</body>
</html>