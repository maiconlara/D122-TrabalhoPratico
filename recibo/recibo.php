<?php
require "../db_functions.php";
require "../force_authenticate.php";
require "../db_credentials.php";

$conn = connect_db();
$sql = "SELECT id, total, emailUser FROM prods WHERE emailUser = '".$_SESSION["user_email"]."'";
  $prods = mysqli_query($conn, $sql);
  $tots = mysqli_query($conn, $sql);
  $descs = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo</title>
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

<div class="hist-title">
<h1>Informações da Ultima Compra</h1>
</div>
<br>


<div class="hist-content">
<div class="hist-text">
<table id="tabela-historico">
<tr>
<th class="produto">ID</th>
<th class="descricao">Comprador</th>
<th class="preço">Total</th>
</tr>
<tr>
 <td class="prod" >
 <?php if (mysqli_num_rows($prods) > 0): ?>
        <?php while($prod = mysqli_fetch_assoc($prods)): ?>
          <div class="prod" id="prod_<?= $prod['id'] ?>">
            <h4><?= $prod['id'] ?></h4>
          </div>
        <?php endWhile; ?>
      <?php endIF; ?>
</td>
 <td class="desc">
 <?php if (mysqli_num_rows($descs) > 0): ?>
        <?php while($desc = mysqli_fetch_assoc($descs)): ?>
          <div class="desc" id="desc_<?= $desc['emailUser'] ?>">
            <h4><?= $desc['emailUser'] ?></h4>
          </div>
        <?php endWhile; ?>
      <?php endIF; ?>
 </td>
 
 <td class="tot">
 <?php if (mysqli_num_rows($tots) > 0): ?>
        <?php while($tot = mysqli_fetch_assoc($tots)): ?>
          <div class="tot" id="tot<?= $tot['total'] ?>">
            <h4><?= $tot['total'] ?></h4>
          </div>
        <?php endWhile; ?>
      <?php endIF; ?>
</td>
 
</tr>
<tr class="pedido-total">
    <td colspan="2"></td>
    <td></td>
</tr>
</table>
</div>
</div>




<footer>
    <br>
    <p> Desenvolvido Por Bruna Kodama, Gabriel Russo e Maicon Lara</p>
</footer>

<script src="script.js"></script>

</body>
</html>