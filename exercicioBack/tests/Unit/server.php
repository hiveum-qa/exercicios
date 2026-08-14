<?php

require_once "Controllers/Filmes.php";

require_once "Server.php";

require_once "Adapters/DataBaseDbteste.php";

require_once "Models/filmeModel.php";


function createFilmeController(){
    $db = new DataBaseDbteste([],[]);
    $s = new Server($db);    
    return new Filmes($s);
}

test("testando", function () {
    $c = createFilmeController();


    $c->insertFilme(new Filme("abc", "csv", "ert", "deg", "reg"));

    $f = $c->server->db->lerFilmes();

    expect($f)->toHaveCount(1);
    expect($f[0]->nome)->toBe("abc");
});