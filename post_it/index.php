<?php
  session_start();

  if(isset($_SESSION['email'])){
    try {
      require_once 'component/User.php';
      $user = new User($_SESSION['id'], $_SESSION['name'], $_SESSION['email']);
      require_once 'view/user_view.php';
    } catch (\Exception $e) {
      $e->getMessage();
    }

  }else {
    header ('location: ../index.php');
  }
?>
