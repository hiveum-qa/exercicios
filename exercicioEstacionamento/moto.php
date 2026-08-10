<?php

require_once "veiculo.php";

#implementando todos os metodos da classe Veiculo
class Moto implements Veiculo
{

    private $placa;

    function __construct($placa)
    {
        $this->placa = $placa;
    }

    function placa()
    {
        return $this->placa;
    }

    function tipo()
    {
        return "moto";
    }

    function valorEstacionamento()
    {
        return "10.00";
    }
}
