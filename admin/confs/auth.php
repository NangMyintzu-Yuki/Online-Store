<?php
  $username = "admin";
  $password = "123456";
  session_start();
  if(!isset($_SESSION['auth'])) {
    header("location: index.php");
    exit();
  }
?>