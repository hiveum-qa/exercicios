<?php

class Serie
{
    public string $nome;
    public string $personagem;
    public string $ano;
    public string $genero;
    public string $temporada;
    public string $imagem;
    public string $id;

    public function __construct($id,$nome, $personagem, $ano, $genero, $temporada, $imagem)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->personagem = $personagem;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->temporada = $temporada;
        $this->imagem = $imagem;
    }
}
