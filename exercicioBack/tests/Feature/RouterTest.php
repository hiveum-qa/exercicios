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

    expect($html)->toContain("nome");
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
        "nome",
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

test("verifica se filmes é um array", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"])->toBeArray();
});


test("verifica se ano e do tipo string", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"][0]["ano"])
        ->toBeString();
});

test("verifica se tem todos os filmes", function () {

    $response = HttpClient()->get("/api/filmes");

    $dados = json_decode($response->getBody(), true);

    expect($dados["filmes"][0]["nome"])
        ->toBe("Meninas Malvadas");

    expect($dados["filmes"][1]["nome"])
        ->toBe("Homem-Aranha");

    expect($dados["filmes"][2]["nome"])
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

test("verifica ", function () {

    $response = HttpClient()->get("/deletarFilme");
    expect($response)->dd();
});


test("verifica a quantidade de propriedade de uma serie especifica", function () {

    $response = HttpClient()->get("/api/series");
    $dados = json_decode($response->getBody(), true);
   
    expect($dados["series"][0])->toHaveLength(6);
});

test("deve cadastrar um filme", function () {

    $response = HttpClient()->post("/cadastrarFilme", [
        "nome" => "Homem-Aranha",
        "ano" => "2026",
        "genero" => "acao",
        "personagem" => "Tom Holland"
    ]);

    expect($response->getStatusCode())
        ->toBe(200);
});

test("não deve cadastrar sem campos preenchidos", function () {

    $response = HttpClient()->post("/cadastrarFilme", [
        "nome" => "",
        "ano" => "",
        "genero" => "",
        "personagem" => ""
    ]);

    $body = (string) $response->getBody();

    expect($body)
        ->toContain("Todos os campos devem ser preenchidos");
});

test("deve aceitar diferentes filmes", function ($nome, $genero) {

    $response = HttpClient()->post("/cadastrarFilme", [
        "nome" => $nome,
        "ano" => "2026",
        "genero" => $genero,
        "personagem" => "Tom"
    ]);

    expect($response->getStatusCode())
        ->toBe(200);

})->with([
    ["Homem-Aranha", "acao"],
    ["Toy Story", "animado"],
    ["Meninas Malvadas", "drama"],
]);











