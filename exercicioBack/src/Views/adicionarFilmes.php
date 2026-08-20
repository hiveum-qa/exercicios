<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Filme</title>

</head>

<body>

    <nav class="navBar">

        <h3 class="cabecalho">
            Lista de Filmes
        </h3>
        <div class="rotas">
            <a href="/home" class="rotasNav">Home</a>
            <a href="/filmes" class="rotasNav">Filmes</a>
            <a href="/series" class="rotasNav">Séries</a>
        </div>
    </nav>


    <main class="container">

        <section class="formCard">

            <div class="cabecalhoFormulario">
                <div>
                    <h1>Cadastrar filme </h1>
                </div>
            </div>

            <form action="/cadastrarFilme" method="post">
                <div class="formularioFilmes">

                    <div class="campo">

                        <label for="nome">
                            Nome do filme
                        </label>

                        <input type="text" placeholder="Digite o nome do filme" class="input" name="nome"id="nome"required>
                    </div>

                    <div class="linha">

                        <div class="campo">

                            <label for="ano">
                                Ano
                            </label>

                            <select
                                name="ano"
                                id="ano">
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

                        <div class="campo">

                            <label for="genero"> Gênero</label>
                            <select name="genero"id="genero">
                                <option value="acao">  Ação</option>
                                <option value="comedia">Comédia</option>
                                <option value="aventura"> Aventura</option>
                                <option value="terror">Terror</option>
                            </select>
                        </div>

                    </div>
                    <div class="campo">
                        <label for="personagem">
                            Personagem principal
                        </label>

                        <input type="text" placeholder="Digite o personagem" class="input" name="personagem" id="personagem"required>
                        </div>

                    <div class="acoes">
                        <a href="/filmes" class="cancelar">Cancelar</a>
                        <button type="submit" class="button"> Cadastrar filme </button>
                    </div>

                </div>

            </form>

        </section>

    </main>


    <style>
        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                radial-gradient(circle at top,
                    #292929 0%,
                    #141414 45%,
                    #0d0d0d 100%);

            color: white;

        }

        .navBar {

            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 60px;
            background: #e50914;
            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.3);

        }

        .cabecalho {

            margin: 0;
            font-size: 20px;

        }

        .rotas {

            display: flex;
            gap: 30px;

        }

        .rotasNav {

            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: 0.2s;

        }


        .rotasNav:hover {
            color: #000;
        }

        .container {

            width: 90%;
            max-width: 750px;
            margin: 60px auto;

        }

        .formCard {

            background:
                rgba(31, 31, 31, 0.95);
            border: 1px solid #303030;
            border-radius: 20px;
            padding: 40px;
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.5);

        }

        .cabecalhoFormulario {

            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 35px;
            padding-bottom: 25px;
            border-bottom:
                1px solid #333;

        }


        .icone {

            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e50914;
            border-radius: 12px;
            font-size: 28px;
            font-weight: bold;

        }

        .cabecalhoFormulario h1 {
            margin: 0 0 5px;
            font-size: 28px;

        }


        .cabecalhoFormulario p {
            margin: 0;
            color: #999;
            font-size: 14px;

        }

        .formularioFilmes {

            display: flex;
            flex-direction: column;
            gap: 22px;

        }

        .campo {
            display: flex;
            flex-direction: column;
            gap: 8px;

        }

        .campo label {
            color: #ddd;
            font-size: 14px;
            font-weight: bold;

        }

        .input,
        select {

            width: 100%;
            padding: 14px 16px;
            background: #141414;
            color: white;
            border: 1px solid #3a3a3a;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition:
                border 0.2s,
                box-shadow 0.2s;

        }


        .input::placeholder {
            color: #666;
        }


        .input:focus,
        select:focus {

            border-color: #e50914;
            box-shadow:
                0 0 0 3px rgba(229, 9, 20, 0.15);

        }

        .linha {

            display: grid;
            grid-template-columns:
                1fr 1fr;
            gap: 20px;

        }

        .acoes {

            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 15px;
            padding-top: 25px;
            border-top:
                1px solid #333;

        }

        .button,
        .cancelar {

            padding: 13px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition:
                transform 0.2s,
                filter 0.2s;

        }

        .button {

            background: #e50914;
            color: white;
            border: none;

        }

        .cancelar {

            background: #292929;
            color: #ddd;
            border: 1px solid #444;

        }


        .button:hover,
        .cancelar:hover {

            transform: translateY(-2px);
            filter: brightness(1.15);

        }


        @media (max-width: 700px) {

            .navBar {
                padding: 18px 25px;
            }


            .container {
                width: 92%;
                margin: 40px auto;

            }


            .formCard {
                padding: 30px;
            }

        }

        @media (max-width: 480px) {

            .navBar {
                flex-direction: column;
                gap: 15px;
                padding: 18px 15px;

            }
            .cabecalho{
                display: none;
            }


            .rotas {
                width: 100%;
                justify-content: center;
                gap: 20px;
            }


            .rotasNav {
                font-size: 14px;
            }


            .container {
                width: 94%;
                margin: 25px auto;
            }


            .formCard {
                padding: 22px 18px;
                border-radius: 15px;
            }


            .cabecalhoFormulario {
                gap: 12px;
                margin-bottom: 25px;
            }


            .icone {
                width: 42px;
                height: 42px;
                font-size: 22px;
                flex-shrink: 0;
            }


            .cabecalhoFormulario h1 {
                font-size: 22px;
            }


            .cabecalhoFormulario p {
                font-size: 12px;
            }

            .linha {

                grid-template-columns: 1fr;
                gap: 22px;

            }

            .acoes {
                flex-direction: column-reverse;
            }

            .button,
            .cancelar {
                width: 100%;
                text-align: center;
                padding: 14px;

            }

        }

        @media (max-width: 350px) {

            .rotas {
                gap: 12px;
            }

            .rotasNav {
                font-size: 13px;
            }

            .formCard {
                padding: 18px 14px;
            }

            .cabecalhoFormulario h1 {
                font-size: 20px;
            }

        }
    </style>

</body>

</html>