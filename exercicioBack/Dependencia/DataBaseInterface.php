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

}