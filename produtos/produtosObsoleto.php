<?php
require "../db_functions.php";
require "../authenticate.php";
require "../db_credentials.php";

$html = <<<HTML
    <span class="nomeClass" id="111" >R$ --</span>
HTML;

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

foreach($xpath -> query('//span[@class="nomeClass"]') as $span) {
    echo $span -> nodeValue, PHP_EOL;
	//$span->getElementById('111')->nodeValue;
	//echo $span;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["pay"])) {
	   $conn = connect_db();
	   $span = mysqli_real_escape_string($conn,$_POST["span"]);
	   $sql = "INSERT INTO $table_prods
              (emailUser, total) VALUES
              ('".$_SESSION["user_email"]."', '$span');";
  }
}
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>


    <div class="models">


        <div class="produto-item">
            <a href="">
                <div class="produto-item--img"><img src="" /></div>
                <div class="produto-item--add">+</div>
            </a>
            <div class="produto-item--price">R$ --</div>
            <div class="produto-item--name">--</div>
            <div class="produto-item--desc">--</div>
        </div>


        <div class="cart--item">
            <img src="" />
            <div class="cart--item-nome">--</div>
            <div class="cart--item--qtarea">
                <button class="cart--item-qtmenos">-</button>
                <div class="cart--item--qt">1</div>
                <button class="cart--item-qtmais">+</button>
            </div>
        </div>

    </div>

    <header>
        <img class="logo" src="images/logopng.png" alt="logo">
        <nav>
            <ul class="nav-link">
                <li><a href="/Login/inicio/homepage.php">Página Inicial</a></li>
                <li><a href="/Login/produtos/produtos.php">Produtos</a></li>
                <li><a href="/Login/recibo/recibo.php">Histórico</a></li>
                <li><a href="/Login/about/about.php">Sobre</a></li>
            </ul>
        </nav>
      
        <div class="menu-openner"><span>0</span>🛒</div>
        <button id="contact-button" onclick="mostrar()">Conta &#x1F464;</button>
        <ul id="conta-options">
                <li><a href="/Login/conta/conta.php">Alterar Dados</a></li>
                <li><a href="/Login/login.php">Sair &rarr;</a></li>
        </ul> 
    </header>

    <main>
        
        <h2>Produtos</h2>

        <div class="produto-area"></div>
    </main>

    <aside>
        <div class="cart--area">
            <div class="menu-closer">❌</div>
            <h1>Seu Carrinho</h1>
            <div class="cart"></div>
            <div class="cart--details">
                <div class="cart--totalitem subtotal">
                    <span>Subtotal</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem desconto">
                    <span>Desconto</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem total big">
                    <span>Total</span>
                    <span class="nomeClass" id="111" >R$ --</span>
                </div>
                <form action="" method="post">
                <div class="cart--finalizar">
				<input type="submit" name="pay" value="Finalizar a Compra" class="modal-btn"></div>
				</form>
            </div>
        </div>
    </aside>

    <div class="produtoWindowArea">
        <div class="produtoWindowBody">
            <div class="produtoInfo--cancelMobileButton">Voltar</div>
            <div class="produtoBig">
                <img src="" />
            </div>
            <div class="produtoInfo">
                <h1>--</h1>
                <div class="produtoInfo--desc">--</div>
                <div class="produtoInfo--pricearea">
                    <div class="produtoInfo--sector">Preço</div>
                    <div class="produtoInfo--price">
                        <div class="produtoInfo--actualPrice">R$ --</div>
                        <div class="produtoInfo--qtarea">
                            <button class="produtoInfo--qtmenos">-</button>
                            <div class="produtoInfo--qt">1</div>
                            <button class="produtoInfo--qtmais">+</button>
                        </div>
                    </div>
                </div>
                <div class="produtoInfo--addButton">Adicionar ao carrinho</div>
                <div class="produtoInfo--cancelButton">Cancelar</div>
            </div>
        </div>
    </div>


    <script src="produtos.js"></script>
    <script src="js/script.js"></script>
</body>
</html>