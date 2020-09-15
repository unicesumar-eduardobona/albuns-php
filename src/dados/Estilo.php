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
                    $this->setCodEstilo($item);
                    break;
                case 'estilo':
                    $this->setEstilo($item);
                    break;
            }
        }
    }

    public function setCodEstilo($codigo)
    {
        $this->codEstilo = (int) $codigo;
    }

    public function getCodEstilo()
    {
        return $this->codEstilo;
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