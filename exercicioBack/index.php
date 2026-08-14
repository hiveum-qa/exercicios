<?php

include "router.php";
require "leitorcsv.php";
require_once "Models/filmeModel.php";
require_once "Server.php";
require_once "Adapters/DataBaseCSV.php";
require_once "Controllers/Filmes.php";


$db = new DataBaseCSV("db/banco.csv", "db/bancoSerie");

$filmesController = new Filmes(new Server($db));


Router::get("/home", function () {
    require "src/Views/homePage.php";
});

Router::get("/filmes", function () {
    require "src/Views/filmes.php";
});

Router::get("/series", function () {
    require "src/Views/series.php";
});

Router::get("/api/filmes", function () use ($filmesController) {
    $filmesController->ler();
  
});

Router::get("/api/series", function () {

    echo json_encode([
        "series" =>
        Leitor::LerSerie("db/bancoSerie.csv")

    ]);
});

Router::get("/adicionarFilme", function () {

    require "src/Views/adicionarFilmes.php";
});


Router::post("/cadastrarFilme", function () use ($filmesController) {
    $filmesController->insert();

});
