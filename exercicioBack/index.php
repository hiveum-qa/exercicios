<?php

#REQUEST_METHOD;
include "router.php";

require "leitorcsv.php";


// Router::post("/veiculos", function() {
//     echo "Bom dia";
// });

Router::get("/veiculos", function(){
    echo "ola";

    echo "ola mundo";

    echo "testando";
});


Router::get("/pasta", function(){
    echo "ola";

    echo "ola estou na pasta";

    echo "testando";
});


Router::get("/estacionamento", function(){
    echo "ola";

    echo "ola estou no estacionamento";

    echo "testando";
});


Router::get("/moto", function(){
    echo "ola";

    echo "ola estou na moto";
});


Router::get("/home", function(){
        require "src/Views/homePage.php";
    
});

Router::get("/filmes", function(){
        require "src/Views/filmes.php";
    
});

Router::get("/series", function(){
        require "src/Views/series.php";
    
});

Router::get("/api/filmes", function(){
        
    echo json_encode(["filmes"=>
        Leitor::LerFilme("db/banco.csv")
    ]);
    
});

Router::get("/api/series", function(){
        
    echo json_encode(["series"=>
     Leitor::LerSerie("db/bancoSerie.csv")

    ]);
    
});

Router::get("/adicionarFilme", function(){

        require "src/Views/adicionarFilmes.php";
    
});

Router::post("/cadastrarFilme", function(){
 
        $nome = $_POST["nome"];
        $ano = $_POST["ano"];
        $genero = $_POST["genero"];
        $personagem = $_POST["personagem"];

        echo json_encode([
            "nome"=>$nome,
            "ano"=>$ano,
            "genero"=>$genero,
            "personagem"=>$personagem
        ]);

      
});



