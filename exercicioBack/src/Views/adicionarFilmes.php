<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulario</title>
</head>

<body>
    <div class="image">
        <nav class="navBar">
            <h3 class="cabecalho">Lista de Filmes</h3>
            <div class="rotas">
                <a href="/home" class="rotasNav">Home</a>
                <a href="/filmes" class="rotasNav">Filme</a>
                <a href="/series" class="rotasNav">Series</a>
            </div>
        </nav>
        <main class="container">
            <h1>CADASTRE SEUS FILMES</h1>
            <form action="/cadastrarFilme" method="post">
                <div class="formularioFilmes">
                    <div>
                        <input type="text" placeholder="Nome do filme" class="input" name="nome">
                    </div>
                    <div>
                       <select name="ano" id="">
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                    <div>
                        <select name="genero" id="">
                            <option value="acao">Ação</option>
                            <option value="comedia">Comedia</option>
                            <option value="aventura">Aventura</option>
                            <option value="terror">Terror</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" placeholder="Personagem" class="input" name="personagem">
                    </div>
                    <button type="submit" >Cadastrar</button>
                </div>
            </form>


        </main>

        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background: #141414;
                color: white;
            }

            .navBar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 60px;
                background-color: #e50914;
            }

            .adicionaFilmes {
                background-color: #e50914;
                color: #000000;
                padding: 15px;
                border: none;
                border-radius: 10px;
                color: #ffffff;
                font-weight: bolder;
            }

            .cabecalho {
                margin: 0;
                color: white;
            }

            .formularioFilmes {
                padding: 5%;
            }

            .input {
                background-color: #141414;
                color: #ffffff;
                font-size: 20px;
                width: 50%;
                padding: 10px;
                margin: 1%;
            }
        </style>

</body>

</html>