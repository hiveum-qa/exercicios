<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Filmes</title>

    <script>
        async function carregar() {

            const lista = document.getElementById("listar");

            const resultado = await fetch("http://localhost:8000/api/series");
            const body = await resultado.json();

            lista.innerHTML = "";
            console.log(body);

            body.series.forEach((serie, indice ) => {
                console.log(serie);

                const card = document.createElement("article");
                card.classList.add("card");

                const excluir = document.createElement("button");

                excluir.type = "button";
                excluir.classList.add("buttonExcluir");
                excluir.textContent = "Excluir";
                excluir.classList.add("excluir");

                excluir.addEventListener("click", async (event) => {

                    const dados = new FormData();

                    dados.append("indice", indice);

                    const resultado = await fetch("http://localhost:8000/deletarSerie", {
                        method: "DELETE",
                        body: JSON.stringify({
                            indice: indice
                        })
                    });
                    console.log(resultado);

                    if (resultado.status == 200) {
                        card.remove();
                    }
                });

                const image = document.createElement("img");
                if (!serie.imagem) {
                    image.src = "/uploads/images.png";
                    console.log("Imagem padrão");
                } else {
                    image.src = serie.imagem;
                }

                const informacoes = document.createElement("div");
                informacoes.classList.add("informacoes");

                const nome = document.createElement("h2");
                const ano = document.createElement("p");
                const genero = document.createElement("p");
                const personagem = document.createElement("p");
                const temporada = document.createElement("p");

                nome.textContent = serie.nome;
                genero.textContent = serie.genero;
                ano.textContent = `Ano: ${serie.ano}`;
                personagem.textContent = `Personagem: ${serie.personagem}`;
                temporada.textContent = `Temporadas: ${serie.temporada}`;
                genero.classList.add("genero");
                nome.classList.add("nome")
                ano.classList.add("ano");
                personagem.classList.add("personagem");
                temporada.classList.add("temporada");
                
                informacoes.append(
                    nome,
                    ano,
                    personagem,
                    temporada,
                    genero,
                    excluir
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
        <div>
            <a href="/adicionarSerie">
                <button class="adicionaSerie">ADICIONAR SERIES</button>
            </a>

        </div>
        <div id="listar" class="listadeSerie">
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

        .adicionaSerie {
            background-color: #e50914;
            color: #000000;
            padding: 15px;
            border: none;
            border-radius: 10px;
            color: #ffffff;
            font-weight: bolder;
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

        .listadeSerie {
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
         .excluir,
        .buttonEditar {
            flex: 1;
            padding: 10px;
            margin-top: 25px;
            margin-right: 15px;
            border-radius: 8px;
            color: white;
            font-size: 13px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition:
                transform 0.2s ease,
                filter 0.2s ease;
        }

        .excluir {
            background: #9d0008;
        }

        .buttonEditar {
            background: #04428e;
        }

        .excluir:hover,
        .buttonEditar:hover {
            transform: translateY(-2px);
            filter: brightness(1.2);
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