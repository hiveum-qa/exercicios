<?php

class Serie{

    public string $nome;
    public string $personagem;
    public string $ano;
    public string $genero;
    public string $temporada;


    public function __construct($nome, $personagem, $ano, $genero, $temporada)
    {
        $this->nome = $nome;
        $this->personagem = $personagem;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->temporada = $temporada;

    }

    
}