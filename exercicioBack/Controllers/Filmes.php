<?php

class Filmes
{

    public Server $server;

    public function __construct(Server $f)
    {
        $this->server = $f;
    }

    public function ler()
    {
        echo json_encode([
            "filmes" =>
            $this->server->db->lerFilmes()
        ]);
    }

    public function insert()
    {
        if (empty($_POST["nome"]) || empty($_POST["ano"]) || empty($_POST["genero"]) || empty($_POST["personagem"])) {
            echo "<script>alert('Todos os campos devem ser preenchidos');</script>";
            return;
        }

        $nome = $_POST["nome"];
        $ano = $_POST["ano"];
        $genero = $_POST["genero"];
        $personagem = $_POST["personagem"];
        $imagem = "";

        $s = new Filme($nome, $personagem, $ano, $genero, $imagem);
        $this->insertFilme($s);

        header("Location:/home");
        exit;
    }

    public function insertFilme(Filme $filme)
    {
        $this->server->db->salvarFilme($filme);
    }

    public function deleteFilme(?int $indice): bool
    {
        if($indice === null){
            http_response_code(404); 
            return false;
        }
        return $this->server->db->deletarFilme($indice);
        
    }
}
