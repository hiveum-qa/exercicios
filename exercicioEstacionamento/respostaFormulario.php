<?php

include "veiculo.php";
include "carro.php";
include "moto.php";
include "estacionamento.php";


$tipoVeiculo = $_POST["tipo"];
$placa = $_POST["placa"];

if($tipoVeiculo == "carro"){
    $veiculo= new Carro($placa);
}
if($tipoVeiculo == "moto"){
    $veiculo = new Moto($placa);
}
if($placa == null){

     echo Components::get("View/teste2.php", [
            "mensagem" => "Tipo de veiculo inválido"
        ]);
    exit();
}

$estacionamento = new Estacionamento();

$estacionamento->registrarEntrada($veiculo);
