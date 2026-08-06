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
            <h2><?= $mensagem ?></h2>
            <p>Placa: <?= $veiculo->placa() ?></p>
            <p> Tipo de veiculo: <?= $veiculo->tipo() ?></p>
            <p> valor: <?= $veiculo->valorEstacionamento() ?></p>
            <a class="confirmacao" href="index.php">Confirmar</a>
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
        height: 270px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        background-color: #ffffff;
        animation: aparecer .3s ease;
        color: #555;
    }

    h2 {
        color: #044221;
    }

    .confirmacao {
        background: #086442;
        color: #fff;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: .3s;
    }

    a {
        text-decoration: none;
        color: #ffffff;
    }

    .confirmacao:hover {
        background-color: #044221;
    }

    @keyframes aparecer {

        from {
            opacity: 0;
            transform: scale(.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }

    }
</style>