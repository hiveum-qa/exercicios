<?php

require_once "veiculo.php";
#implementando todos os metodos da classe Veiculo
class Carro implements Veiculo
{

    private  string $placa;

    public function __construct(string $placa)
    {
        $this->placa = $placa;
    }

    function  placa()
    {
        return $this->placa;
    }
    function  tipo()
    {
        return "carro";
    }
    function  valorEstacionamento()
    {
        return "15.00";
    }
}
