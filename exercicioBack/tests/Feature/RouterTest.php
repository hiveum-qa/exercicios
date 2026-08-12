<?php

test("b", function () {
    $a = HttpClient()->get("/veiculos");

    expect($a->getBody()->read(1024))->toContain("ola");
});

test("tem na pagina veiculos", function () {

    $response = HttpClient()->get("/veiculos");

    $html = (string) $response->getBody();

    expect($html)->toContain("ola");
});

test("tem na pagina moto", function () {

    $response = HttpClient()->get("/moto");

    $html = (string) $response->getBody();

    expect($html)->toContain("ola");
});

test("tem na pagina filmes", function () {

    $response = HttpClient()->get("/filmes");

    $html = (string) $response->getBody();

    expect($html)->toContain("name");
});

test("tem na pagina series", function ($proprieedade) {

    $response = HttpClient()->get("/series");

    $html = (string) $response->getBody();

    expect($html)->toContain($proprieedade);
})->with(
    [
        "Home",
        "Filme",
        "Series",
    ]
);

test("na rota api filmes contem as propriedades", function ($propriedade) {

    $response = HttpClient()->get("/api/filmes");

    $html = (string) $response->getBody();

    expect($html)->toContain($propriedade);
})->with(
    [
        "name",
        "personagem",
        "ano",
        "genero"
    ]
);

test("testando se as rotas existem", function ($rota) {

    $response = HttpClient()->get($rota);

    expect($response->getStatusCode())
        ->toBe(200);

})->with([
    "/veiculos",
    "/moto",
    "/filmes",
    "/api/filmes",
    "/api/series",
]);

test("deve retornar 3 filmes", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"])->toHaveCount(3);
});

test("verifica se filmes é um array", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"])->toBeArray();
});


test("verifica se ano e do tipo inteiro", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"][0]["ano"])
        ->toBeInt();
});

test("verifica se a imagem nao esta vazia", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"][0]["image"])->not->toBeEmpty();
});

test("verifica se a imagem existe", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect(file_exists($dados["filmes"][0]["image"]))->not->toBeFalse();
});

test("verifica se tem todos os filmes", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"][0]["name"])
        ->toBe("Meninas Malvadas");

    expect($dados["filmes"][1]["name"])
        ->toBe("Homem-Aranha");

    expect($dados["filmes"][2]["name"])
        ->toBe("Toy Story1");
});

test("verifica se tem todos os personagens", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);
    
    expect($dados["filmes"][0]["personagem"])
        ->toBe("Ana");

    expect($dados["filmes"][1]["personagem"])
        ->toBe("Tom Holland");

    expect($dados["filmes"][2]["personagem"])
        ->toBe("wood");
});

test("verifica a quantidade de propriedade de um filme especifico", function () {

    $response = HttpClient()->get("/api/filmes");
    $dados = json_decode($response->getBody(), true);
   
    expect($dados["filmes"][0])->toHaveLength(5);
});


test("verifica a quantidade de propriedade de uma serie especifica", function () {

    $response = HttpClient()->get("/api/series");
    $dados = json_decode($response->getBody(), true);
   
    expect($dados["series"][0])->toHaveLength(5);
});


test("verifica se a temporada da serie esta voltando int", function () {

    $response = HttpClient()->get("/api/series");
    $dados = json_decode($response->getBody(), true);
   
    expect($dados["series"][0]["temporadas"])->toBeInt();
});






