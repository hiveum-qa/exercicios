<?php

include "veiculo.php";
include "carro.php";
include "moto.php";
include "estacionamento.php";
include "session.php";

$tipoVeiculo = $_POST["tipo"];
$placa = $_POST["placa"];


if ($tipoVeiculo == "carro") {
    $veiculo = new Carro($placa);
}
if ($tipoVeiculo == "moto") {
    $veiculo = new Moto($placa);
}
if ($placa == null) {
    #arquivo components do Mateus
    echo Components::get("View/teste2.php", [
        "mensagem" => "Digite uma placa válida"
    ]);
    exit();
}

$sess = new Session();
$sess->verificar($placa);

$estacionamento = new Estacionamento();

$estacionamento->registrarEntrada($veiculo);
