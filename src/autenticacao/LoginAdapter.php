<?php
namespace Autenticacao;

include_once __DIR__ . "/../dados/Connection.php";

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class LoginAdapter implements AdapterInterface
{
    private $usuario;
    private $senha;

    /**
     * Instancie este adaptador com usuário e senha
     *
     * @param $usuario
     * @param $senha
     */
    public function __construct($usuario, $senha)
    {
        $this->usuario = $usuario;
        $this->senha = sha1($senha);
    }

    /**
     * Método necessário para um adaptador de autenticação
     * Neste caso, ilustrativo,
     *  irá comparar um usuário com uma senha estática em sha1 que
     *  os alunos da unicesumar conhecem
     * @return Result
     */
    public function authenticate()
    {
        $conn = \Dados\Connection::getInstance()->connection;
        $sql = "SELECT * FROM usuario WHERE email=:email and senha=:senha";
        $sth = $conn->prepare($sql);

        $sth->execute([
            ':email' => $this->usuario,
            ':senha' => $this->senha
        ]);

        if($sth->rowCount() == 1){
            // login passou
            // retorna um resultado válido
            return new Result(Result::SUCCESS, $this->usuarioToArray());
        }

        // login não passou
        // retorna um resultado inválido com mensagem de erro
        return new Result(Result::FAILURE, $this->usuarioToArray(),
            ['Usuário ou senha inválidos. Tente novamente.']);
    }

    /**
     * @return array
     */
    private function usuarioToArray()
    {
        return ['usuario' => $this->usuario];
    }
}