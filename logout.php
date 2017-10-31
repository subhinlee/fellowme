<?php
  session_start();
  $_SESSION["username"] = "";
  header('Location: signup.php');
?>
