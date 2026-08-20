<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Filmes</title>

    <script>
        async function carregar() {

            const lista = document.getElementById("listar");

            const resultado = await fetch("http://localhost:8000/api/filmes");
            const body = await resultado.json();

            lista.innerHTML = "";

            body.filmes.forEach(filme => {

                const card = document.createElement("article");
                card.classList.add("card");

                const image = document.createElement("img");

                if (!filme.imagem) {
                    image.src = "/uploads/images.png";
                    console.log("Imagem padrão");
                } else {
                    image.src = filme.imagem;
                }

                image.alt = filme.nome;

                console.log(image);

                const informacoes = document.createElement("div");
                informacoes.classList.add("informacoes");

                const nome = document.createElement("h2");
                const genero = document.createElement("p");

                nome.textContent = filme.nome;
                genero.textContent = filme.genero;
                nome.classList.add("nome");
                genero.classList.add("genero");

                informacoes.append(
                    nome,
                    genero
                );

                card.append(
                    image,
                    informacoes
                );

                lista.appendChild(card);
            });

        }

        window.addEventListener(
            "DOMContentLoaded",
            carregar
        );
    </script>

</head>

<body>
    <div class="image">
        <nav class="navBar">
            <h3 class="cabecalho">Lista de Filmes</h3>
            <h3 class="titulo"> Filmes</h3>
            <div class="rotas">
                <a href="/home" class="rotasNav">Home</a>
                <a href="/filmes" class="rotasNav">Filme</a>
                <a href="/series" class="rotasNav">Series</a>
            </div>
        </nav>
        <main class="container">
            <div>
                <a href="/adicionarFilme">
                    <button class="adicionaFilmes">ADICIONAR FILMES</button>
                </a>

            </div>
            <div id="listar" class="listadeFilme">
                <p class="carregando">
                    Carregando filmes...
                </p>
            </div>
    </div>

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

        .cabecalho,
        .titulo {

            margin: 0;
            color: white;

        }

        .titulo {
            display: none;
        }

        .rotas {
            display: flex;
            gap: 30px;

        }

        .rotasNav {
            color: white;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
            transition: .2s;
        }

        .rotasNav:hover {
            color: #000000;
        }

        .container {
            width: 84%;
            max-width: 1300px;
            margin: 40px auto;

        }

        .topo {
            margin-bottom: 40px;
        }

        .adicionaFilmes {

            background-color: #e50914;
            color: white;
            padding: 15px 20px;
            margin-bottom: 40px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;

        }

        .adicionaFilmes:hover {
            transform: scale(1.03);

        }

        .listadeFilme {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;

        }

        .card {
            background: #1b1b1b;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            border: 1px solid #2c2c2c;
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: #e50914;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.55);
        }

        .card img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .informacoes {
            padding: 18px;
            background: linear-gradient(to bottom,
                    #1f1f1f,
                    #181818);
        }

        .informacoes h2 {
            margin: 0 0 8px;
            font-size: 21px;
            color: #ffffff;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .informacoes .ano {
            display: block;
            color: #888;
            font-size: 14px;
            margin: 0 0 12px;
        }

        .genero {
            display: block;
            margin: 0;
            padding: 6px 12px;
            border-radius: 20px;
            background: rgba(229, 9, 20, 0.15);
            border: 1px solid #e50914;
            color: #e50914 !important;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: center;
        }

        @media (max-width: 900px) {

            .navBar {
                  padding: 20px 30px;

            }

            .container {
                width: 90%;
            }

            .listadeFilme {
                grid-template-columns:
                    repeat(3, 1fr);
                gap: 20px;

            }

            .card img {
                height: 280px;
            }

        }

        @media (max-width: 700px) {

            .navBar {
                padding: 18px 20px;
            }

            .cabecalho {
                display: none;
            }

            .titulo {
                display: block;
            }

            .rotas {
                gap: 15px;
            }

            .rotasNav {
                font-size: 15px;
            }

            .container {
                width: 92%;
                margin: 30px auto;

            }

            .listadeFilme {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .card img {
                height: 260px;

            }

        }



        @media (max-width: 480px) {

            .navBar {
                padding: 15px;
                flex-direction: column;
                gap: 15px;
            }

            .titulo {
                font-size: 20px;
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
                width: 92%;
                margin: 25px auto;
            }

            .topo {
                margin-bottom: 25px;
            }


            .adicionaFilmes {
                width: 100%;
                padding: 14px;
            }

            .listadeFilme {
                grid-template-columns: 1fr;
                gap: 20px;
            }


            .card img {
                height: 400px;
            }

            .informacoes {
                padding: 15px;
            }

            .informacoes h2 {
                font-size: 19px;
            }
            .titulo{
                display: none;
            }

        }

        @media (max-width: 350px) {

            .rotas {
                gap: 10px;
            }

            .rotasNav {
                font-size: 13px;
            }

            .card img {
                height: 350px;
            }

        }
    </style>

</body>

</html>