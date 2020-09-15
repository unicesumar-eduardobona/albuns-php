<?php
include __DIR__.'/vendor/autoload.php';

$controller = new \App\Login();
$vars = $controller->login();
?>

<?php $controller->imprimirLayoutInicio();?>

<main role="main" class="py-5 container">
    <div class="col-md-6 offset-md-3">
        <form action="" method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Entrar</h1>

            <?php if(isset($vars['erro'])): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        <?=$vars['erro']?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" name="email" class="form-control mb-3" placeholder="Digite seu email" required autofocus>

            <label for="senha" class="sr-only">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control mb-3" placeholder="Digite sua senha" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>
</main>

<?php $controller->imprimirLayoutTermino()?>