<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Estacionamento </title>
</head>

<body class="principal">
    <h1 class="tituloPrincipal">Estacionamento do Shopping</h1>

    <div class="image">
        <div class="overlay"></div>

        <div class="texto">
            <h2>Estacionamento do Shopping</h2>
        </div>

        <div class="formulario">
            <form action="respostaFormulario.php" method="post">
                <h2>Cadastre seu veículo</h2>

                <p>Digite a placa do veículo</p>
                <input type="text" maxlength="7" placeholder="ABC1234" name="placa">

                <p>Tipo de veículo</p>
                <select name="tipo">
                    <option value="carro">Carro</option>
                    <option value="moto">Moto</option>
                </select>

                <button type="submit" class="cadastrar">
                    Cadastrar veículo
                </button>
            </form>
        </div>
    </div>
</body>

</html>

<style>
    .image {
        position: relative;
        background-image: url("image/carroVerde.jpg");
        background-size: cover;
        background-position: center;
        min-height: calc(100vh - 70px);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 80px;
        gap: 80px;
    }

    .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .45);
    }

    .texto,
    .formulario {
        position: relative;
        z-index: 2;
    }

    .texto {
        color: white;
        max-width: 450px;
    }

    .texto h2 {
        font-size: 52px;
        margin-bottom: 20px;
    }

    .texto p {
        font-size: 22px;
        line-height: 1.6;
    }

    .formulario h2 {
        margin-top: 0;
        color: #086442;
    }

    .texto p {
        font-size: 20px;
        line-height: 1.5;
    }

    .principal {
        text-align: center;
        justify-content: center;
        padding: 0;
        margin: 0;
    }

    .formulario {
        right: 80px;
        width: 420px;
        background: white;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, .35);
    }

    .tituloPrincipal {
        margin: 0;
        padding-bottom: 20px;
        padding-top: 20px;
        color: #fbf6f6;
        background-color: #086442;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .titulo {
        margin-top: 10%;
    }

    .cadastrar {
        padding: 10px 20px;
        display: block;
        margin: 1.5vw auto;
        border-radius: 8px;
        border: 0.5px;
        background-color: #086442;
        color: #fff;
        cursor: pointer;
    }

    .cadastrar:hover {
        background-color: #0daf74;
    }

    .opcoes {
        padding: 8px 10px;
    }

    input,
    select,
    button {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        margin-bottom: 18px;
        border-radius: 8px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input {
        border-radius: 8px;
    }

    .rodape {
        background-color: #086442;
        width: 100%;
        padding: 0;
        margin: 0;
    }

    @keyframes descerElemento {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>