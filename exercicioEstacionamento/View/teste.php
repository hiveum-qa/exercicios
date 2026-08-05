<?php

/**
 * @var string $mensagem
 * @var Veiculo $veiculo
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="principal">
    <div>
        <div class="secundario">
            <h3><?= $mensagem ?></h3>
            <p>Placa: <?= $veiculo->placa() ?></p>
            <p> Tipo de veiculo: <?= $veiculo->tipo() ?></p>
            <p> valor: <?= $veiculo->valorEstacionamento() ?></p>
            <button class="confirmacao">
                <a href="index.php">Confirmar</a>
            </button>
        </div>
    </div>
    </div>

</body>

</html>
<style>
    .principal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .secundario {
        background: white;
        width: 22vw;
        height: 22vh;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        color: #ffffff;
        background-color: #086442;
    }

    .confirmacao {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #086442;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        border-radius: 10px;
        border: none;
    }

    a {
        text-decoration: none;
        color: #ffffff;
    }

    .confirmacao:hover {
        background-color: #044221;
    }
</style>