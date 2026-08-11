<?php

#REQUEST_METHOD;
include "router.php";


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
Router::get("/filmes/information{id}", function(){
        
    
});

Router::get("/api/filmes", function(){
        
    echo json_encode(["filmes"=>[
        [
            "name"=> "Meninas Malvadas",
            "personagem"=> "Ana",
            "ano"=> 2005,
            "genero"=> "drama"
    ],
        [
            "name"=> "Homem-Aranha",
            "personagem"=> "Tom Holland",
            "ano"=> 2026,
            "genero"=> "ação"
    ], [
            "name"=> "Toy Story1",
            "personagem"=> "wood",
            "ano"=> 2003,
            "genero"=> "animado"
    ]
    ]]);
    
});


