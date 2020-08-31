<?php

class Estilo
{
    private $codigo;
    private $estilo;

    public function __construct($data = [])
    {
        foreach ($data as $indice => $item) {
            switch ($indice) {
                case 'codigo':
                    $this->setCodigo($item);
                    break;
                case 'estilo':
                    $this->setEstilo($item);
                    break;
            }
        }
    }

    public function setCodigo($codigo)
    {
        $this->codigo = (int) $codigo;
    }

    public function getCodigo()
    {
        return $this->codigo;
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