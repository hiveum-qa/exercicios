<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        async function carregar() {
            const resultado = await fetch("http://localhost:8000/api/filmes");
            let body = await resultado.json();

            const lista = document.getElementById("listar");

            body.filmes.forEach(filme => {
                const nome = document.createElement("h2");

                nome.textContent = filme.name;

                lista.appendChild(nome);
            });
        }

        window.onload = carregar();
    </script>
</head>

<body>
    <nav class="navBar">
        <ul>
            <a href="/home" class="rotasNav">Home</a>
            <a href="/filmes"  class="rotasNav" >Filme</a>
            <a href="/series"  class="rotasNav" >Series</a>
        </ul>
    </nav>

    <h2>Lista de Filmes</h2>
    <div id="listar" class="listadeFilme">
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
.listadeFilme{
    display: flex; 
    gap: 20px;
}
</style>