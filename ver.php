<?php
include __DIR__.'/vendor/autoload.php';

$controller = new \App\Index();
$vars = $controller->ver();

$controller->imprimirLayoutInicio();
?>

<main role="main" class="pb-3">
<?php if ($vars['album']): ?>

    <?=$controller->imprimirJumbotron(
        $vars['album']['titulo'],
        $vars['album']['subtitulo'],
        $vars['estilos'],
        $vars['album']['cod_estilo']
    )?>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 p-0">
                <img class="w-100 img img-fluid" src="<?=$vars['album']['url_capa']?>" alt="Capa do Álbum" />
            </div>
            <div class="col-sm-8">
                <div class="album p-2 bg-light">
                    <div class="container">
                        <div class="row">
                            <ul class="list-group w-100">
                                <?php foreach ($vars['musicas'] as $musica): ?>
                                    <li class="list-group-item">
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">
                                                    <?=$musica['titulo']?>
                                                </h5>
                                            </div>
                                            <small><?=\Dados\Estrela::converterEstrelasImagem($musica['voto'], $musica['cod_album'])?></small>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">Álbum não encontrado</div>
        </div>
    </div>

<?php endif; ?>
</main>

<?php $controller->imprimirLayoutTermino()?>