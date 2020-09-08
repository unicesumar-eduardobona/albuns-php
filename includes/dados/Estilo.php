<?php
namespace Dados;

class Estilo
{
    private $codEstilo;
    private $estilo;

    public function __construct($data = [])
    {
        foreach ($data as $indice => $item) {
            switch ($indice) {
                case 'cod_estilo':
                    $this->setCodigoEstilo($item);
                    break;
                case 'estilo':
                    $this->setEstilo($item);
                    break;
            }
        }
    }

    public function setCodigoEstilo($codigo)
    {
        $this->codEstilo = (int) $codigo;
    }

    public function getCodigoEstilo()
    {
        return $this->codigoEstilo;
    }

    public function setEstilo($estilo)
    {
        $this->estilo = $estilo;
    }

    public function getEstilo()
    {
        return $this->estilo;
    }
}