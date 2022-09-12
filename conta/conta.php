<?php
require "../db_functions.php";
require "../force_authenticate.php";
require "../db_credentials.php";

if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["delete"])) {
	  $conn = connect_db();
    
    $sql = "DELETE FROM $table_prods WHERE emailUser = '".$_SESSION["user_email"]."'";
		$result = mysqli_query($conn, $sql);
	  $sql = "DELETE FROM $table_users WHERE email = '".$_SESSION["user_email"]."'";
		$result = mysqli_query($conn, $sql);
  
		header('Location: ../login.php');
  } else if (isset($_POST["submit"])){
	  $conn = connect_db();
	  $name = $_POST["name"];
	  $email = $_POST["email"];
	  $password = md5($_POST["password"]);
	  $sql = "UPDATE $table_users SET name='$name', password ='$password' WHERE email='$email'";
	  $result = mysqli_query($conn, $sql);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


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
                <?php if ($login): ?>
                <li><a href="logout.php">Sair &rarr;</a></li>
				<?php endif; ?>
        </ul> 
    </header>

<div class="account-title">
<h1>Opções da Conta</h1>
</div>
<br>


<div class="login-box">
    <form action="/Login/conta/conta.php" method="post" autocomplete="off">
    <div class="user-box">
        <input type="text" name="name" required>
        <label>Nome</label>
      </div>
      <div class="user-box">
        <input type="email" name="email" value="<?php echo $_SESSION["user_email"];?>" required autocomplete="off" readonly>
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required id="senha-1">
        <label>Senha</label>
      </div>
      <div class="user-box">
        <input type="password" name="confirm_password" required id="senha-conf">
        <label>Confirmar Senha</label>
      </div>
      <p id="val-senha"></p>
      <a>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" name="submit" value="Salvar Dados" class="registrar" id="registro-btn"> 
      </a>
    </form>

    <input type="submit" name="submit" value="Deletar Conta" class="registrar" id="del-btn" onclick="mostrar2()" > 

    <div class="delete-modal" id="delete-modal">
        <h1>deletar conta</h1>
        <p>Você deseja realmente deletar sua conta?</p>
        <div class="delete-buttons">
		<form action="" method="post">
            <input type="submit" value="Deletar" class="modal-btn">
			<input type="hidden" name="delete">
            <input type="button" value="Cancelar" class="modal-btn" onclick="mostrar2()">
        </form>
		</div>
    </div>
<script src="script.js"></script>
</body>
</html>