<?php

class Filme
{

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

    public function criarFilmes(string $nome, string $personagem, string $ano, string $genero, string $imagem)
    {

        $filmes = [$nome, $personagem, $ano, $genero, $imagem];

        $arquivo = fopen("db/banco.csv", "a");

        try {
            if ($filmes) {
                fputcsv($arquivo, $filmes, ";");
            }
        } catch (Exception $e) {
            echo "erro" . $e->getMessage();
        }
    }
}
