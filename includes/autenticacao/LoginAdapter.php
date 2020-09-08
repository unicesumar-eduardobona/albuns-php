<?php
namespace Autenticacao;

use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class LoginAdapter implements AdapterInterface
{
    private $usuario;
    private $senha;
    private $senhaDesejada = '4e30f09dcde57beb4aa37c04a9e3ef51da66e431';

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
        $usuarioCorreto = ($this->usuario == 'turma.si@unicesumar.edu.br');
        $senhaCorreta = ($this->senha == $this->senhaDesejada);

        if ($usuarioCorreto && $senhaCorreta) {
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