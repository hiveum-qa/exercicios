<?php
include "Components.php";

class Placas{

function mostrarVeiculos(){
    $session = new Session();
    $veiculos = $session->getVeiculos();
    $tabela = "";
#percorri getveiculos que estava me retornando a data placa e o tipo da session
    foreach($veiculos as $veiculo){
         $tabela .= "
                <tr>
                    <td>{$veiculo['placa']}</td>
                    <td>{$veiculo['hora']}</td>
                    <td>{$veiculo['tipo']}</td>
                </tr>
            ";
        }
    echo Components::get("View/placas.php", [
            "tabela" => $tabela
        ]);
    }
         
}
