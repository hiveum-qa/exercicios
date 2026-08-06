<?php
include "Components.php";

class Estacionamento {

    public function registrarEntrada(Veiculo $veiculo){
    #arquivo components do Mateus
       echo Components::get("View/teste.php", [
            "mensagem" => "Veiculo cadastrado",
            "veiculo" => $veiculo
        ]);
    } 
    
  
}

