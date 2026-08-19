<?php

interface DataBaseInterface{
    /**
     * @return Serie[];
     */
    
public function lerSeries():array;
    /**
     * @return Filme[];
     */

public function lerFilmes():array;
  
public function salvarFilme(Filme $f):bool;

public function criarSerie(Serie $s):bool;

public function deletarFilme(int $indice):bool;

public function deletarSerie(int $indice): bool;

public function editarFilme(int $indice, Filme $filme): bool;
}