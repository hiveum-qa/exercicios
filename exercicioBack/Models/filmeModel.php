<?php

class Filme{

    public string $nome;
    public string $personagem;
    public string $ano;
    public string $genero;
    public string $imagem;


    public function __construct($nome, $personagem, $ano, $genero, $imagem)
    {
        $this->nome = $nome;
        $this->personagem = $personagem;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->imagem = $imagem;

    }

    
}