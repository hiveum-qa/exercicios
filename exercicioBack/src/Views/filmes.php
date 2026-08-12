<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
  <script>
        async function carregar() {
            const resultado = await fetch("http://localhost:8000/api/filmes");
            let body = await resultado.json();
           
            const lista = document.getElementById("listar");
            

            body.filmes.forEach(filme => {
                const nome = document.createElement("h2");
                const ano = document.createElement("p");
                const genero = document.createElement("p");
                 const image = document.createElement("img");

                nome.textContent = filme.nome;
                ano.textContent = filme.ano;
                genero.textContent = filme.genero;
                image.src = filme.imagem;
        

                lista.appendChild(nome);
                lista.appendChild(ano);
                lista.appendChild(genero);
                lista.appendChild(image);
             
            });
        }

        window.onload = carregar();
    </script>
<body>
    <h1>
        
    </h1>
      <nav class="navBar">
        <ul>
            <a href="/home" class="rotasNav">Home</a>
            <a href="/filmes"  class="rotasNav" >Filme</a>
            <a href="/series"  class="rotasNav" >Series</a>
        </ul>
    </nav>
    <div id="listar" class="listadeFilme">
        <div>

        </div>
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
}
  img{
        width: 15%;
        height: 15%;
    }
</style>

