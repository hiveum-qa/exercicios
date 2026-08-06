<?php

/**
 * @var string $mensagem
 * @var string $placaRepetida
 * @var string $placaCadastrada
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
    <div class="secundario">
        <h1>Erro </h1>
        <h3><?= $mensagem ?> </h3>
        <h3><?= $placaRepetida?> </h3>
        <h3><?=  $placaCadastrada ?></h3>
        <button class="voltar">
            <a href="index.php">Voltar</a>
        </button>
    </div>
</body>

</html>

<style>
    body{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.principal{
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, .6);
    display: flex;
    justify-content: center;
    align-items: center;
}

.secundario{
    width: 420px;
    max-width: 90%;
    background: #ffffff;
    border-radius: 15px;
    padding: 35px;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,.35);
    animation: aparecer .3s ease;
}

.secundario h1{
    margin: 0;
    color: #dc3545;
    font-size: 34px;
}

.secundario h3{
    color: #555;
    font-size: 18px;
    font-weight: normal;
    margin: 20px 0 30px;
}

.voltar{
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

.voltar:hover{
    background: #064c32;
    transform: translateY(-2px);
}

.voltar a{
    color: white;
    text-decoration: none;
    display: block;
}

@keyframes aparecer{

    from{
        opacity: 0;
        transform: scale(.8);
    }

    to{
        opacity: 1;
        transform: scale(1);
    }

}
</style>