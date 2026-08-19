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
        $series = [$s->nome, $s->personagem, $s->ano, $s->genero, $s->temporada,  $s->imagem];

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

    public function deletarFilme(int $indice): bool
    {

        if (!file_exists($this->arquivo_filmes)) {
            http_response_code(404);
            return false;
        }

        $linhas = file($this->arquivo_filmes, FILE_IGNORE_NEW_LINES);

        if (!isset($linhas[$indice])) {
            http_response_code(404);
            return false;
        }

        unset($linhas[$indice]);

        $fp = fopen($this->arquivo_filmes, "w");

        foreach ($linhas as $linha) {
            fwrite($fp, $linha . PHP_EOL);
        }

        fclose($fp);

        return true;
    }

    public function deletarSerie(int $indice): bool
    {
 
        if (!file_exists($this->arquivo_series)) {
            http_response_code(404);
            return false;
        }

        $linhas = file($this->arquivo_series, FILE_IGNORE_NEW_LINES);

        if (!isset($linhas[$indice])) {
            http_response_code(404);
            return false;
        }

        unset($linhas[$indice]);

        $fp = fopen($this->arquivo_series, "w");

        foreach ($linhas as $linha) {
            fwrite($fp, $linha . PHP_EOL);
        }

        fclose($fp);

        return true;
}
}