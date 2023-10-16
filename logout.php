<?php
  session_start();
    unset($_SESSION['username']);
    unset($_SESSION['login']);
  session_destroy();
  header("location:index.php"); //setelah logout akan diarahkan ke index/login
?>