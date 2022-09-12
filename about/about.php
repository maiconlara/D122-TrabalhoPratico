<?php
require "../force_authenticate.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
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
                <li><a href="">Sobre</a></li>

            </ul>
        </nav>
        <button id="contact-button" onclick="mostrar()">Conta &#x1F464;</button>
        <ul id="conta-options">
                <li><a href="/Login/conta/conta.php">Alterar Dados</a></li>
                <li><a href="/Login/login.php">Sair &rarr;</a></li>
        </ul> 
    </header>

<div class="about-title">
<h1>sobre nós</h1>
<img class="logo" src="logopng2.png" alt="logo">
</div>
<br>


<div class="about-content">
<img src="fachadapng.png" alt="Fachada" class="fachadaloja">
<div class="about-text">
<p>Somos uma empresa pequena de venda de produtos de tecnologia, buscamos
    ao máximo fazer com que nosso clientes fiquem satisfeitos com nosso atendimento
    e com os nosso produtos. Preços e condições de pagamento exclusivos para compras via internet e podem variar nas lojas físicas. Os preços anunciados neste site ou via e-mail promocional podem ser alterados sem prévio aviso. A Lojinha Informática, não é responsável por erros descritivos. As fotos contidas nesta página são meramente ilustrativas do produto e podem variar de acordo com o fornecedor/lote do fabricante. Ofertas válidas até o término de nossos estoques. Vendas sujeitas à análise e confirmação de dados.
</p> </div>
</div>




<footer>
    <br>
    <p> Desenvolvido Por Bruna Kodama, Gabriel Russo e Maicon Lara</p>
</footer>


<script src="script.js"></script>
</body>
</html>