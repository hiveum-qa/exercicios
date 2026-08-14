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

                const informacoes = document.createElement("div");
                informacoes.classList.add("informacoes");

                const nome = document.createElement("h2");
                const ano = document.createElement("p");
                const genero = document.createElement("p");

                nome.textContent = filme.nome;
                genero.textContent = filme.genero;
                ano.textContent = ` ${filme.ano}`;
                genero.classList.add("genero");

                informacoes.append(
                    nome,
                    ano,
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
    <nav class="navBar">
        <h3 class="cabecalho">Lista de Filmes</h3>
        <div class="rotas">
            <a href="/home" class="rotasNav">Home</a>
            <a href="/filmes" class="rotasNav">Filme</a>
            <a href="/series" class="rotasNav">Series</a>
        </div>
    </nav>
    <main class="container">

        <div id="listar" class="listadeFilme">
            <p class="carregando">
                Carregando filmes...
            </p>
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

        .cabecalho {
            margin: 0;
            color: white;
        }

        .rotas {
            display: flex;
            gap: 30px;
        }

        .rotasNav {
            color: white;
            text-decoration: none;
            font-size: 17px;
            font-size: large;
            font-weight: bolder;
        }

        .rotasNav:hover {
            color: #000000;
        }

        a {
            text-decoration: none;
            color: #ffffff;
            font-size: 25px;
        }

        img {
            width: 15%;
            height: 15%;
        }

        .container {
            width: 84%;
            max-width: 1300px;
            margin: 40px auto;
        }

        .listadeFilme {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
            margin-top: 10%;
        }

        .card {
            background: #1f1f1f;
            border-radius: 12px;
            overflow: hidden;
            transition: transform .3s, box-shadow .3s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, .5);
        }

        .card img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            display: block;
        }

        .informacoes {
            padding: 18px;
        }

        .informacoes h2 {
            margin: 0 0 12px;
            font-size: 21px;
        }

        .informacoes p {
            margin: 7px 0;
            color: #bbb;
        }

        .genero {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 12px;
            border-radius: 20px;
            background: #e50914;
            color: white !important;
            font-size: 13px;
        }
    </style>

</body>

</html>