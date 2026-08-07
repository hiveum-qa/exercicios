<?php

class Session
{

    function verificar($placa)
    {
        #coloquei as informações das placas na session para comparar se tem placas que ja foram cadastradas
        session_set_cookie_params(10);
        session_start();

        $this->inicializarPlacas();
        $this->verificarTempo();
        $this->verificarPlaca($placa);

        $_SESSION['placas'][] = $placa;
    }

    function inicializarPlacas()
    {
        if (!isset($_SESSION['placas'])) {
            $_SESSION['placas'] = [];
        }
    }

    function verificarPlaca($placa)
    {
        #percorre o array de placas para ver se ja tem placa cadastrada
        foreach ($_SESSION['placas'] as $placasRep) {
            if ($placasRep == $placa) {
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
        if (!isset($_SESSION['tempo_inicio'])) {
            $_SESSION['tempo_inicio'] = time();
        }

        #retira a placa do array depois de 10 segundos, so destroi se eu enviar outra informação se não o negocio continua lá
        if (time() - $_SESSION['tempo_inicio'] > 10) {
            #limpa a sessao
            session_unset();
            #destroi a sessao
            session_destroy();
            session_start();
            $_SESSION['placas'] = [];
            $_SESSION['tempo_inicio'] = time();
        }
    }
}
