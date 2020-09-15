<?php
namespace App;

class Login extends LayoutAbstract
{
    public function login()
    {
        if (count($_POST) == 0) {
            return [];
        }

        if (!isset($_POST['email']) or !isset($_POST['senha'])) {
            return [
                'erro' => 'Email e Senha são obrigatórios'
            ];
        }

        $usuario = $_POST['email'];
        $senha = $_POST['senha'];

        // instancia o adaptador de login com usuário e senha
        $loginAdapter = new \Autenticacao\LoginAdapter($usuario, $senha);
        // instancia o serviço de autenticação
        $authService = new \Zend\Authentication\AuthenticationService();
        // conecta o serviço ao adaptador criado para a aplicação
        $authService->setAdapter($loginAdapter);
        // conecta o serviço a sessão (session para persistir login)
        $authService->setStorage(new \Zend\Authentication\Storage\Session());

        $auth = $authService->authenticate();
        if ($auth->isValid()) {
            return header('location: index.php');
        }

        return [
            'erro' => $auth->getMessages()[0]
        ];
    }

    public function logout()
    {
        $authService = new \Zend\Authentication\AuthenticationService();

        if ($authService->hasIdentity()) {
            $authService->clearIdentity();
        }

        return header('location: login.php');
    }
}