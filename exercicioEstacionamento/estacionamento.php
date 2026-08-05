<?php
include "Components.php";

class Estacionamento {

    public function registrarEntrada(Veiculo $veiculo){

       echo Components::get("View/teste.php", [
            "mensagem" => "Veiculo cadastrado",
            "veiculo" => $veiculo
        ]);
    } 
    
  
}

