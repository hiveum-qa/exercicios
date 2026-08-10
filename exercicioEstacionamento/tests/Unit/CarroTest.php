<?php

require "carro.php";

test("testanto tipo carro", function(){

$c = new Carro("dfr1256");

$tipo = $c->tipo();

expect($tipo)->toBe("carro");

});

test("valor estacionamento carro", function(){

$c = new Carro("dfr1256");

$valor = $c->valorEstacionamento();

expect($valor)->toBe("15.00");

});

test("placa esta retornando um valor verdadeiro", function(){

$c = new Carro("dfr1256");
$placa = $c->placa();

expect($placa)->toBeTruthy();

});


test("valor do estacionamento retorna uma string", function(){

$c = new Carro("dfr1256");

$valor = $c->valorEstacionamento();

expect($valor)->toBeString();

});

test("verifica se usam a interface veiculo", function(){

$c1 = new Carro("dfr1256");
$c2 = new Carro ("frg5678");

$veiculos = [$c1,$c2];


expect($veiculos)->toContainOnlyInstancesOf(Veiculo::class);

});

test("verifica se a placa contem apenas números alfa numericos", function(){

$c = new Carro("dfr1256");
$placa = $c->placa();

expect($placa)->toBeAlphaNumeric();

});




