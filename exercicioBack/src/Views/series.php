<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    async function carregarSeries() {
        const resultado = await fetch("http://localhost:8000/api/series");
        let body = await resultado.json();

        const lista = document.getElementById("listar");

        body.series.forEach(series => {
            const nome = document.createElement("h2");
            const ano = document.createElement("p");
            
            nome.textContent = series.nome;
            ano.textContent = series.ano;
  
            lista.appendChild(nome);
             lista.appendChild(ano);
        });  
    }
    window.onload = carregarSeries();
</script>

<body>

    <nav class="navBar">
        <ul>
            <a href="/home" class="rotasNav">Home</a>
            <a href="/filmes" class="rotasNav">Filme</a>
            <a href="/series" class="rotasNav">Series</a>
        </ul>
    </nav>
    <div id="listar">

    </div>
</body>

</html>

<style>
    .navBar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 20px;
        justify-content: center;

    }

    a {
        text-decoration: none;
        color: #333;
        font-size: 25px;
        display: flex;
    }
  
</style>