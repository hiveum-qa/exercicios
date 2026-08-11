<?php

require "moto.php";

test('Testando tipo moto', function () {

   
$m = new Moto("asd1456");


expect($m->tipo())->toBe("moto");

});

test('verificando se moto foi criada a partir da classe Moto', function () {

   
$m = new Moto("asd1456");


expect($m)->toBeInstanceOf(Moto::class);

});

test('Testando valor estacionamento', function () {

   
$m = new Moto("asd1456");

$v = $m->valorEstacionamento();


expect($v)->toBe("10.00");

});


test('verificando a placa da moto', function () {

    $m = new Moto("asd1456");

    expect($m->placa())->toBe("asd1456");

});

test('valor do estacionamento deve ser uma string', function () {

    $m = new Moto("asd1456");

    expect($m->valorEstacionamento())->toBeString();

});


