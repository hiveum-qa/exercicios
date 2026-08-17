<?php
require_once "Dependencia/DataBaseInterface.php";

class DataBaseMysql implements DataBaseInterface
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
         return Leitor::LerSerie($this->arquivo_series);
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
       $series = [$s->nome, $s->personagem, $s->ano,$s->genero, $s->temporada,  $s->imagem];

        $arquivo = fopen($this->arquivo_series, "a");

        try {
            if ($series) {
                fputcsv($arquivo, $series, ";");
            }
        } catch (Exception $e) {
            echo "erro" . $e->getMessage();
        }
        return false;
    }
}
