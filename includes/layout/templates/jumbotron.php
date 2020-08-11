<?php
    $class_todos_active = ($escolha == null) ? ' active' : null;
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">
            <?=$titulo?>
        </h1>
        <p class="lead text-muted">
            <?=$descricao?>
        </p>

        <p>
            <a href="index.php" class="btn btn-primary btn-lg btn-outline-primary <?=$class_todos_active?>">Todos</a>

            <?php
                foreach ($estilos as $estilo):
                    $url = 'index.php?estilo=' . $estilo;
                    $class_active = ($estilo == $escolha) ? ' active' : null;
            ?>
            <a class='btn btn-primary btn-lg btn-outline-primary <?=$class_active?>' href='<?=$url?>'>
                <?=$estilo?>
            </a>
            <?php endforeach; ?>

        </p>

    </div>
</section>
