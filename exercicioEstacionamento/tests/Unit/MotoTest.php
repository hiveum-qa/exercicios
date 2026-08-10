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

test('Testando se tem carro ou moto dentro de tipo', function () {

   
$m = new Moto("asd1456");

$v = $m->tipo();

expect($v)->toBeIn(["carro", "moto"]);

});
