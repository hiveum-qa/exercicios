
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Estacionamento </title>
</head>

<body class="principal">
    <h1 class="tituloPrincipal">Estacionamento do shopping</h1>

    <form action="respostaFormulario.php" method="post">
        <p>Digite a placa do veiculo</p>
        <input type="text" maxlength="7" placeholder="ABC1234" name="placa" class="placaVeiculo">
    
    <p>Tipo de veiculo:</p>
    <select name="tipo"class="opcoes">
        <option value="carro">Carro</option>
        <option value="moto">Moto</option>
    </select>

    <button type="submit" class="cadastrar">Cadastrar veiculo</button>
</form>
</body>

</html>

<style>
    .principal{
        text-align: center;
        justify-content: center;
        padding: 0;
        margin: 0;

    }
    .tituloPrincipal{
        margin: 0;
        padding-bottom: 20px;
        padding-top: 20px;
        color: #fbf6f6;
        background-color: #086442;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }
    .cadastrar{
        padding: 10px 20px;
        display: block;
        margin: 1.5vw auto;
        border-radius: 8px;
        border: 0.5px;
        background-color: #086442;
        color: #fff;
        cursor: pointer;
    }
    .cadastrar:hover{
        background-color: #fafbff;
        color: #000;
    }
    .opcoes{    
        padding: 8px 10px;
    }
    input, select,button{
    width: 50%;
    padding:10px;
    margin-top:10px;
    margin-bottom:15px;
    border-radius: 5px;
    }
    input{
      border-radius: 8px;
    }

</style>