<?php
    include __DIR__ . "/includes/dados/_dados.php";
    include __DIR__ . '/includes/layout-functions.php';

    $estilo_escolhido = isset($_GET['estilo']) ? $_GET['estilo'] : null;

    $estilos = listar_estilos();

    $codigo = $_GET['codigo'] ?? -1;

    $album = recuperar_album($codigo);
    $musicas = listar_musicas($codigo);
?>
<!doctype html>
<html lang="pt-br">

<?php include __DIR__ . "/includes/layout/head.php"; ?>

<body>

<?php include __DIR__ . "/includes/layout/header.php"; ?>

<main role="main" class="pb-3">
<?php if ($album): ?>

    <?=criar_jumbotron(
        $album['titulo'],
        $album['descricao'],
        $estilos,
        $album['estilo']
    );?>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 p-0">
                <img class="w-100 img img-fluid" src="<?=$album['capa']?>" alt="Capa do Álbum" />
            </div>
            <div class="col-sm-8">
                <div class="album p-2 bg-light">
                    <div class="container">
                        <div class="row">
                            <ul class="list-group w-100">
                                <?php foreach ($musicas as $musica): ?>
                                    <li class="list-group-item">
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">
                                                    <?=$musica['titulo']?>
                                                </h5>
                                                <small>há 2 semanas</small>
                                            </div>
                                            <small>5 estrelas</small>
                                        </a>
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

<?php include __DIR__ . "/includes/layout/footer.php"; ?>

</body>
</html>
