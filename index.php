<?php
    include __DIR__ . "/includes/dados/_dados.php";
    include __DIR__ . '/includes/layout-functions.php';

    $estilo_escolhido = isset($_GET['estilo']) ? $_GET['estilo'] : null;

    $estilos = listar_estilos();
    $albuns = listar_albuns();
?>
<!doctype html>
<html lang="pt-br">

<?php include __DIR__ . "/includes/layout/head.php"; ?>

<body>

<?php include __DIR__ . "/includes/layout/header.php"; ?>

<main role="main">

    <?=criar_jumbotron(
            'Álbuns em Destaque',
            'Aproveite o tempo livre e curta uma boa música',
            $estilos)
    ?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php if (! in_array($estilo_escolhido, $estilos) && $estilo_escolhido != null): ?>
                    <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert">
                            O estilo escolhido não foi encontrado
                        </div>
                    </div>
                <?php endif;?>

                <?php
                    foreach ($albuns as $codigo => $album):
//                        var_dump($estilo_escolhido != null);
//                    exit;
                        if ($estilo_escolhido == null || $album['estilo'] == $estilo_escolhido):
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="<?=$album['capa']?>" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                <?=$album['titulo']?>:
                                <?=$album['descricao']?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="ver.php?codigo=<?=$codigo?>" class="btn btn-sm btn-outline-secondary">
                                        Ver
                                    </a>
                                </div>
                                <small class="text-muted">
                                    <?=$album['estilo']?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        endif;
                    endforeach;
                ?>
            </div>
        </div>
    </div>

</main>

<?php include __DIR__ . "/includes/layout/footer.php"; ?>

</body>
</html>