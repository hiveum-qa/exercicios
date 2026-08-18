<?php

require_once "Controllers/Filmes.php";
require_once "Controllers/Serie.php";

require_once "Server.php";

require_once "Adapters/DataBaseDbteste.php";

require_once "Models/filmeModel.php";
require_once "Models/serieModel.php";


function createFilmeController()
{
    $db = new DataBaseDbteste([], []);
    $s = new Server($db);
    return new Filmes($s);
}

function createSerieController()
{
    $db = new DataBaseDbteste([], []);
    $s = new Server($db);
    return new Series($s);
}

test("testando se insere uma serie", function () {
    $c = createSerieController();

    $c->insertSerie(new Serie("abc", "csv", "ert", "deg", "8", "ght"));

    $f = $c->server->db->lerSeries();

    expect($f)->toHaveCount(1);
    expect($f[0]->nome)->toBe("abc");
});

test("testando se insere um filme", function () {
    $c = createFilmeController();


    $c->insertFilme(new Filme("abc", "csv", "ert", "deg", "reg"));

    $f = $c->server->db->lerFilmes();

    expect($f)->toHaveCount(1);
    expect($f[0]->nome)->toBe("abc");
});

test("deve deletar um filme", function () {

    $c = createFilmeController();

    $c->insertFilme(new Filme("abc", "csv", "ert", "deg", "reg"));

    $resultado = $c->deleteFilme(0);

    expect($resultado)->toBeTrue();

    $filmes = $c->server->db->lerFilmes();

    expect($filmes)->toHaveCount(0);
});

test("deve deletar o filme correta", function () {

    $c = createFilmeController();

    $c->insertFilme(new Filme("abc", "csv", "ert", "deg", "reg"));
    $c->insertFilme(new Filme("luna", "csv", "ert", "deg", "reg"));

    $resultado = $c->deleteFilme(0);

    expect($resultado)->toBeTrue();

    $filmes = $c->server->db->lerFilmes();

    expect($filmes)->toHaveCount(1);
    expect($filmes[0]->nome)->toBe("luna");
});

test("não deve deletar filme com indice inexistente", function () {

    $c = createFilmeController();

    $c->insertFilme(new Filme("abc", "csv", "ert", "deg", "reg"));
    $c->insertFilme(new Filme("luna", "csv", "ert", "deg", "reg"));

    $resultado = $c->deleteFilme(10);

    expect($resultado)->toBeFalse();
});

test("não deve deletar filme quando não existe", function () {

    $c = createFilmeController();
    $resultado = $c->deleteFilme(0);

    expect($resultado)->toBeFalse();
});

test("deve deletar uma serie", function () {

    $c = createSerieController();

    $c->insertSerie(new Serie("abc", "csv", "ert", "deg", "reg", "dfg"));

    $resultado = $c->deleteSerie(0);

    expect($resultado)->toBeTrue();

    $filmes = $c->server->db->lerFilmes();

    expect($filmes)->toHaveCount(0);
});

test("deve apagar a serie correta", function () {

    $c = createSerieController();

    $c->insertSerie(new Serie("abc", "csv", "ert", "deg", "reg", "dfg"));
    $c->insertSerie(new Serie("nome", "csv", "ert", "deg", "reg", "dfg"));

    $resultado = $c->deleteSerie(0);

    expect($resultado)->toBeTrue();

    $serie = $c->server->db->lerSeries();

    expect($serie)->toHaveCount(1);
    expect($serie[0]->nome)->toBe("nome");
});

test("não deve deletar serie com indice inexistente", function () {

    $c = createSerieController();

    $c->insertSerie(new Serie("abc", "csv", "ert", "deg", "reg", "ert"));
    $c->insertSerie(new Serie("luna", "csv", "ert", "deg", "reg", "rtg"));

    $resultado = $c->deleteSerie(10);

    expect($resultado)->toBeFalse();
});

test("não deve deletar quando não existe serie", function () {

    $c = createSerieController();

    $resultado = $c->deleteSerie(0);

    expect($resultado)->toBeFalse();
});


