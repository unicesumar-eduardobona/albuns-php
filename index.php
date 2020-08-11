<?php
    include __DIR__ . "/includes/dados/_dados.php";
    include __DIR__ . '/includes/layout-functions.php';

    $estilo_escolhido = $_GET['estilo'] ?? null; // coalesce

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
            $estilos,
            $estilo_escolhido
    );?>

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


                <?=criar_lista_albuns($albuns, $estilo_escolhido)?>

            </div>
        </div>
    </div>

</main>

<?php include __DIR__ . "/includes/layout/footer.php"; ?>

</body>
</html>