<?php
require "db_functions.php";
require "authenticate.php";

$error = false;
$password = $email = "";
if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["email"]) && isset($_POST["password"])) {
    $conn = connect_db();
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password = md5($password);
    $sql = "SELECT email,password FROM $table_users
            WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    if($result){
      if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user["password"] == $password) {

          $_SESSION["user_email"] = $user["email"];
		  $_SESSION["user_name"] = $user["name"];

          header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/inicio/homepage.php");
          exit();
        }
        else {
          $error_msg = "Email ou senha incorretos!";
          $error = true;
        }
      }
      else{
        $error_msg = "Email ou senha incorretos!";
        $error = true;
      }
    }
    else {
      $error_msg = mysqli_error($conn);
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
    <link rel="stylesheet" href="/Login/style.css">
    <title>Login</title>
</head>
<body>

  <video src="/Login/chipvideo.mp4" class="back-video" autoplay muted loop plays-inline></video>

  <div class="login-box">
    <h2>LOGIN</h2>
	
<?php if ($error): ?>
<h3 style="color:red;"><?php echo $error_msg; ?></h3>
<?php endif; ?>

    <form action="login.php" method="post" autocomplete="off">
      <div class="user-box">
        <input type="email" name="email" value="<?php echo $email; ?>" required autocomplete="off">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required>
        <label>Senha</label>
      </div>
      <p id="val-senha"></p>
      <a>
        <input type="submit" name="submit" value="Entrar" value="" class="entrar"> 
      </a>
    </form>
    <form>
      <a href="registro/registro.php" id="reg">   
        <input type="button" name="submit" value="Registrar" class="entrar" id="registrar">
      </a>
      </form>
  </div>
    <script src="script.js"></script>
</body>
</html>