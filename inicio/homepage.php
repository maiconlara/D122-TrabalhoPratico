<?php
require "../force_authenticate.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tudo">
    <header>
        <img class="logo" src="logopng.png" alt="logo">
        <nav>
            <ul id="nav-link">
                <li><a href="/Login/inicio/homepage.php">Página Inicial</a></li>
                <li><a href="/Login/produtos/produtos.php">Produtos</a></li>
                <li><a href="/Login/recibo/recibo.php">Histórico</a></li>
                <li><a href="/Login/about/about.php">Sobre</a></li>

            </ul>
        </nav>
        <button id="contact-button" onclick="mostrar()">Conta &#x1F464;</button>
        <ul id="conta-options">
                <li><a href="/Login/conta/conta.php">Alterar Dados</a></li>
                <li><a href="/Login/login.php">Sair &rarr;</a></li>
        </ul> 

    </header>
    
<div id="slider">
    <a href="" target="">
    <figure>
        <img src="notebookgamer-img.png" alt="">
        <img src="kitgamer-img.png">
        <img src="pcgamer-img.png" alt="">
        <img src="gabinete-img.png" alt="">
        <img src="notebookgamer-img.png" alt="">
    </figure>
</a>
</div>
<br>
<h1 id="slogan">A MAIOR LOJA DE INFORMÁTICA</h1>
</div>
<footer>
    <br>
    <p> Desenvolvido Por Bruna Kodama, Gabriel Russo e Maicon Lara</p>
</footer>

<script src="script.js"></script>

</body>
</html>