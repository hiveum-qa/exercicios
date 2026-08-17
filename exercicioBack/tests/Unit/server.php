<?php

require_once "Controllers/Filmes.php";
require_once "Controllers/Serie.php";

require_once "Server.php";

require_once "Adapters/DataBaseDbteste.php";

require_once "Models/filmeModel.php";
require_once "Models/serieModel.php";


function createFilmeController(){
    $db = new DataBaseDbteste([],[]);
    $s = new Server($db);    
    return new Filmes($s);
}

function createSerieController(){
    $db = new DataBaseDbteste([],[]);
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



