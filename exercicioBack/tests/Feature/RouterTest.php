<?php


test("A", function(){
    $a = HttpClient()->get("/veiculos");

    expect($a->getStatusCode())->toBe(200);

});

test("b", function(){
    $a = HttpClient()->get("/veiculos");

    expect($a->getBody()->read(1024))->toContain("ola");

});

test('tem na pagina veiculos ', function () {

$response = HttpClient()->get('/veiculos');

$html = (string) $response->getBody();

expect($html)->toContain('ola');

});

test('tem na pagina moto', function () {

$response = HttpClient()->get('/moto');

$html = (string) $response->getBody();

expect($html)->toContain('ola');

});

