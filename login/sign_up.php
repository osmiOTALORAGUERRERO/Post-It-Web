<?php
  require_once '../database/database.php';
  $db = new DB();

  if (isset($_SESSION['email'])) {
    header('location: session.php')
  }

  if($_SERVER(REQUEST_METHOD) == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
  }
  require_once 'view/sign_up.php';
?>
