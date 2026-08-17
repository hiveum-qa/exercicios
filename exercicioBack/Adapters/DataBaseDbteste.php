<?php
require_once "Dependencia/DataBaseInterface.php";

class DataBaseDbteste implements DataBaseInterface
{

    public array $filmes;
     public array $series;

       public function __construct(array $f, array $s)
       {
            $this->filmes = $f;
            $this->series = $s;
       }
    public function lerSeries(): array
    {
        return $this->series;
    }

    public function lerFilmes(): array
    {
        return $this->filmes;
    }

    public function salvarFilme(Filme $f): bool
    {

       $this->filmes [] = $f;

       return true;
    }

    public function criarSerie(Serie $s): bool
    {
        $this->series [] = $s;
        return true;
    }
}
