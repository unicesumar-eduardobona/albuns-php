<?php
    include __DIR__ . "/includes/dados.php";
    include __DIR__ . '/includes/layout-functions.php';
    $estilo_escolhido = isset($_GET['estilo']) ? $_GET['estilo'] : null;

    $estilos = listar_estilos();

    $codigo = $_GET['codigo'] ?? -1;

    $album = recuperar_album($codigo);
?>
<!doctype html>
<html lang="pt-br">

<?php include __DIR__ . "/includes/layout/head.php"; ?>

<body>

<?php include __DIR__ . "/includes/layout/header.php"; ?>

<main role="main">
<?php if ($album): ?>

    <?=criar_jumbotron(
        $album['titulo'],
        $album['descricao'],
        $estilos)
    ?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                Lista de Músicas
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

<?php include __DIR__ . "/includes/layout/footer.php"; ?>

</body>
</html>
