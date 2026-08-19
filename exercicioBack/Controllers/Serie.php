<?php

class Series
{

    public Server $server;

    public function __construct(Server $s)
    {
        $this->server = $s;
    }

    public function ler()
    {
        echo json_encode([
            "series" =>
            $this->server->db->lerSeries()
        ]);
    }

    public function insert()
    {
        if (empty($_POST["nome"]) || empty($_POST["ano"]) || empty($_POST["genero"]) || empty($_POST["personagem"]) || empty($_POST["temporada"])) {
            echo "<script>alert('Todos os campos devem ser preenchidos');</script>";
            return;
        }
        $id = "";
        $nome = $_POST["nome"];
        $ano = $_POST["ano"];
        $genero = $_POST["genero"];
        $personagem = $_POST["personagem"];
        $temporada = $_POST["temporada"];
        $imagem = "";

        $s = new Serie($id,$nome, $personagem, $ano, $genero, $temporada, $imagem);
        $this->insertSerie($s);

        header("Location:/series");
        exit;
    }

    public function insertSerie(Serie $serie)
    {
        $this->server->db->criarSerie($serie);
    }

    public function deleteSerie(?int $indice): bool
    {
        if ($indice === null) {
            http_response_code(404);
            return false;
        }

        return $this->server->db->deletarSerie($indice);
    }
}
