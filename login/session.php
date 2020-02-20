<?php
  session_start();

  if(isset($_SESSION['email'])){
    header('location: ../post_it/index.php');
  }else {
    header('location: login.php');
  }
?>
