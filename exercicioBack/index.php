<?php

include "router.php";
require "leitorcsv.php";
require_once "Models/filmeModel.php";
require_once "Server.php";
require_once "Adapters/DataBaseCSV.php";
require_once "Controllers/Filmes.php";
require_once "Controllers/Serie.php";

$db = new DataBaseCSV("db/banco.csv", "db/bancoSerie.csv");

$filmesController = new Filmes(new Server($db));
$serieController = new Series(new Server($db));

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

Router::get("/api/series", function () use ($serieController) {
    $serieController->ler();
});

Router::get("/adicionarSerie", function () {

    require "src/Views/adicionarSeries.php";
});

Router::post("/cadastrarSerie", function () use ($serieController) {
    $serieController->insert();
});

Router::get("/adicionarFilme", function () {

    require "src/Views/adicionarFilmes.php";
});

Router::post("/cadastrarFilme", function () use ($filmesController) {
    $filmesController->insert();
});

Router::delete("/deletarFilme", function () use ($filmesController) {

    $dados = json_decode(file_get_contents("php://input"), true);

    $indice = $dados["indice"];

    $filmesController->deleteFilme($indice);
});

Router::delete("/deletarSerie", function () use ($serieController) {
    $dados = json_decode(file_get_contents("php://input"), true);

    $indice = $dados["indice"];
    $serieController->deleteSerie($indice);
});
