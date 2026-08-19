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
        $linhas = [];

        if (file_exists($this->arquivo_filmes)) {
            $linhas = file(
                $this->arquivo_filmes,
                FILE_IGNORE_NEW_LINES
            );
        }

        $maiorId = 0;

        foreach ($linhas as $linha) {

            if (empty($linha)) {
                continue;
            }

            $dados = str_getcsv($linha, ";");

            $id = (int) $dados[0];

            if ($id > $maiorId) {
                $maiorId = $id;
            }
        }

        $novoId = $maiorId + 1;

        $filmes = [$novoId, $f->nome, $f->personagem, $f->ano, $f->genero, $f->imagem];

        $arquivo = fopen($this->arquivo_filmes, "a");

        try {

            fputcsv($arquivo, $filmes, ";");

            fclose($arquivo);

            return true;
        } catch (Exception $e) {

            fclose($arquivo);

            return false;
        }
    }
    public function criarSerie(Serie $s): bool
    {
    var_dump($this->arquivo_series);
        $linhas = [];

        if (file_exists($this->arquivo_series)) {
            $linhas = file(
                $this->arquivo_series,
                FILE_IGNORE_NEW_LINES
            );
        }
        

        $maiorId = 0;

        foreach ($linhas as $linha) {

            if (empty($linha)) {
                continue;
            }

            $dados = str_getcsv($linha, ";");

            $id = (int) $dados[0];

            if ($id > $maiorId) {
                $maiorId = $id;
            }
        }

        $novoId = $maiorId + 1;

        $series = [$novoId, $s->nome, $s->personagem, $s->ano, $s->genero, $s->temporada, $s->imagem];

        $arquivo = fopen($this->arquivo_series, "a");

        try {

            fputcsv($arquivo, $series, ";");

            fclose($arquivo);

            return true;
        } catch (Exception $e) {

            fclose($arquivo);

            return false;
        }
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

    public function editarFilme(int $indice, Filme $filme): bool
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

        $linhas[$indice] = $filme->nome . ";" . $filme->personagem . ";" . $filme->ano . ";" . $filme->genero . ";" . $filme->imagem;

        $fp = fopen($this->arquivo_filmes, "w");

        foreach ($linhas as $linha) {
            fwrite($fp, $linha . PHP_EOL);
        }

        fclose($fp);

        return true;
    }
}
