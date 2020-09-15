<?php
include __DIR__.'/vendor/autoload.php';

//"zendframework/zend-authentication": "^2.7",
//        "zendframework/zend-session": "^2.9"


if (isset($_POST['email']) and isset($_POST['senha'])) {
    $usuario = $_POST['email'];
    $senha = $_POST['senha'];

    // instancia o adaptador de login com usuário e senha
    $login = new \Autenticacao\LoginAdapter($usuario, $senha);

    // instancia o serviço de autenticação
    $authService = new \Zend\Authentication\AuthenticationService();

    // conecta o serviço ao adaptador criado para a aplicação
    $authService->setAdapter($login);

    // conecta o serviço a sessão (session para persistir login)
    $authService->setStorage(new \Zend\Authentication\Storage\Session());

    $auth = $authService->authenticate();
    if ($auth->isValid()) {
        // passou no login
        // redireciona a tela
        return header('location: index.php');
    }

    // não passou no login
    // recebe mensagem de erro e mostra novamente a tela
    $erro = $auth->getMessages()[0];
}

include __DIR__ . '/src/layout-functions.php';

?>
<!doctype html>
<html lang="pt-br">

<?php include __DIR__ . "/src/layout/head.php"; ?>

<body>

<?php include __DIR__ . "/src/layout/header.php"; ?>

<main role="main" class="py-5 container">
    <div class="col-md-6 offset-md-3">
        <form action="" method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Entrar</h1>

            <?php if(isset($erro)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        <?=$erro?>
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

<?php include __DIR__ . "/src/layout/footer.php"; ?>

</body>
</html>