<?php
  session_start();

  if(isset($_SESSION['email'])){
    require_once 'view/user_view.php';
  }else {
    header ('location: ../index.php');
  }
?>
