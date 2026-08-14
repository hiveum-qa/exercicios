<?php
require_once "Dependencia/DataBaseInterface.php";

class DataBaseCSV implements DataBaseInterface
{

    public string $arquivo_filmes;
       public string $arquivo_series;

       public function __construct(string $f, string $s)
       {
            $this->arquivo_filmes = $f;
            $this->arquivo_series = $s;
       }
    public function lerSeries(): array
    {
        return [];
    }

    public function lerFilmes(): array
    {
        return Leitor::LerFilme($this->arquivo_filmes);
    }

    public function salvarFilme(Filme $f): bool
    {

        $filmes = [$f->nome, $f->personagem, $f->ano, $f->genero, $f->imagem];

        $arquivo = fopen($this->arquivo_filmes, "a");

        try {
            if ($filmes) {
                fputcsv($arquivo, $filmes, ";");
            }
        } catch (Exception $e) {
            echo "erro" . $e->getMessage();
        }
        return false;
    }

    public function criarSerie(Serie $s): bool
    {
        return true;
    }
}
