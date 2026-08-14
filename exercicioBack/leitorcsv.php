<?php

require "Models/filmeModel.php";
require "Models/serieModel.php";

class Leitor
{

    public static function LerFilme( string $arquivo)
    {
        $banco = file_get_contents($arquivo);

        $linhas = explode(PHP_EOL, $banco);

        $filmes = [];

        foreach ($linhas as $l) {
            if($l == ""){
                continue;
            }
            $linhaQuebrada = explode(';', $l);
            $filmes[] = new Filme(...$linhaQuebrada);
        }

        return $filmes;
    }

    public static function LerSerie(string $arquivo)
    {
        $banco = file_get_contents($arquivo);

        $linhas = explode(PHP_EOL, $banco);

        $series = [];

        foreach ($linhas as $l) {
            $linhaQuebrada = explode(';', $l);
            $series[] = new Serie(...$linhaQuebrada);
        }

        return $series;
    }
    

}
