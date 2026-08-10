<?php

require "session.php";
#essa função especifica o que deve ser feito antes de cada teste
beforeEach(function () {
    $_SESSION = [];
});

test('sessao inicializada com sucesso', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();

    expect($a)->toBeArray();
});

test('verificar placa', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();

    $v = $a[0];

    expect($v["placa"])->toBe("asd456");
});

test('verificar tipo', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();

    $v = $a[0];

    expect($v["tipo"])->toBe("carro");
});

test('verificar se hora existe', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();

    $v = $a[0];

    expect($v)->toHaveKey("hora");
});

test('verifica se existe a placa no array', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();

    $v = $a[0];

    expect($v)->toContain("asd456");
});

test('verificar hora entrada', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();

    $v = $a[0];

    expect($v["horaEntrada"])->toBeInt();
});

test('verificar a remoção do veiculo antes dos 10s ', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");
    $veiculos = $s->getVeiculos();

    #faz com que o veiculo tenha entrado a 5s
    $_SESSION['veiculos'][0]['horaEntrada'] = time() - 5;


    $s->verificar("xyz789", "moto");
    $veiculos = $s->getVeiculos();

    expect($veiculos)->toHaveCount(2);

    expect($veiculos[0]["placa"])->toBe("asd456");
    expect($veiculos[1]["placa"])->toBe("xyz789");
});

test('verificar a remoção do veiculo depois dos 10s ', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");
    $veiculos = $s->getVeiculos();

    $_SESSION['veiculos'][0]['horaEntrada'] = time() - 11;

    #limpa a sessao e coloca outro
    $s->verificar("xyz789", "moto");

    $veiculos = $s->getVeiculos();

    expect($veiculos)->toHaveCount(1);
    expect($veiculos[0]["placa"])->toBe("xyz789");
});


test('verificar se possui todas as propriedades na session', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();
    #com o and não preciso colocar o expect de novo
    expect($a[0])->toHaveKey("placa")-> and($a[0])->toHaveKey("tipo")-> and($a[0])->toHaveKey("hora")->and($a[0])->toHaveKey("horaEntrada");
});


test('verificar a quantidade de propriedade no array', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");

    $a = $s->getVeiculos();

    expect($a[0])->toHaveLength(4);
});

test('verificar placa repetida', function () {

    $s = new Session();

    $s->verificar("asd4567", "carro");

    $a = $s->getVeiculos();

    expect(fn() => $s->verificar("asd4567","carro"))->toThrow(Exception::class);
});

test('todos os veículos devem ser arrays', function () {

    $s = new Session();

    $s->verificar("asd456", "carro");
    $s->verificar("xyz789", "moto");

    $veiculos = $s->getVeiculos();

    expect($veiculos)->each->toBeArray();

});



