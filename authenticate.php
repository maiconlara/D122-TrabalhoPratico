<?php
  session_start();

  if (isset($_SESSION["user_email"])) {
    $login = true;
    $user_email = $_SESSION["user_email"];
  }
  else{
    $login = false;
  }

?>
