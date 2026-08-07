<?php

class Session
{

    function verificar($placa, $tipoVeiculo)
    {
        $this->inicializarPlacas();
        $this->verificarTempo();
        $this->verificarPlaca($placa);
        $this->limparSession();
#coloquei uma hora formatada hora e outra hora de entrada para ver quanto tempo o veiculo ficou ali
        $_SESSION['veiculos'][] = [
            "placa" => $placa,
            "hora" => date("H:i:s"),
            "horaEntrada" => time(),
            "tipo" => $tipoVeiculo
        ];
    }

    function __construct()
    {
        #coloquei as informações das placas na session para comparar se tem placas que ja foram cadastradas
        session_set_cookie_params(10);
        #coloquei para me dar a hora do brasil
        date_default_timezone_set('America/Sao_Paulo');
        session_start();
    }

    function inicializarPlacas()
    {
        if (!isset($_SESSION['placas'])) {
            $_SESSION['placas'] = [];
        }
    }

    function verificarPlaca($placa)
    {

        foreach ($_SESSION['veiculos'] as $veiculo) {
            #percorre o array de placas para ver se ja tem placa cadastrada
            if ($veiculo['placa'] == $placa) {
                echo Components::get("View/teste2.php", [
                    "placaCadastrada" => "Placa já cadastrada"
                ]);
                exit();
            }
        }
    }

    function verificarTempo()
    {
        #verifica se a váriavel não foi definida ou se esta igual a null
        if (!isset($_SESSION['horaEntrada'])) {
            $_SESSION['horaEntrada'] = time();
        }
    }

    private function limparSession()
    {
        #retira a placa do array depois de 10 segundos, so destroi se eu enviar outra informação se não o negocio continua lá
        foreach ($_SESSION['veiculos'] as $indice => $veiculo) {
            if (time() - $veiculo['horaEntrada'] > 10) {

                unset($_SESSION['veiculos'][$indice]);
            }
        }
        $_SESSION['veiculos'] = array_values($_SESSION['veiculos']);
    }

    function getVeiculos()
    {
        return $_SESSION['veiculos'];
    }
}
