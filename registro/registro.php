<?php
require "../db_functions.php";

$error = false;
$success = false;
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {

    $conn = connect_db();

    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);

    if ($password == $confirm_password) {
      $password = md5($password);

      $sql = "INSERT INTO $table_users
              (name, email, password) VALUES
              ('$name', '$email', '$password');";

      if(mysqli_query($conn, $sql)){
        $success = true;
		header("Location: ../login.php");
          exit();
      }
      else {
        $error_msg = mysqli_error($conn);
        $error = true;
      }
    }
    else {
      $error_msg = "Senha não confere com a confirmação.";
      $error = true;
    }
  }
  else {
    $error_msg = "Por favor, preencha todos os dados.";
    $error = true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
		
    <div class="tudo">
    <div class="login-box">
    <h2>Registrar-se</h2>
    <form action="registro.php" method="post" autocomplete="off">
    <div class="user-box">
        <input type="text" name="name" value="<?php echo $name; ?>" required>
        <label>Nome</label>
      </div>
      <div class="user-box">
        <input type="email" name="email" value="<?php echo $email; ?>" autocomplete="off" required>
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" value="" required id="senha-1">
        <label>Senha</label>
      </div>	
      <div class="user-box">
        <input type="password" name="confirm_password" value="" required id="senha-conf">
        <label>Confirmar Senha</label>
      </div>
      <p id="val-senha"></p>
      <a>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" name="submit" value="Registrar" class="registrar" id="registro-btn"> 

      </a>
    </form>
  </div>

<script src="script.js"></script>
</body>
</html>