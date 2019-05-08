<?php
  session_start();

  require_once '../database/database.php';
  $db = new DB();

  if (isset($_SESSION['email'])) {
    require_once 'session.php';
  }


  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $statement = $db -> connect() -> prepare('SELECT * FROM PostIt.Users
      WHERE email = :email AND password = :password');
      $statement -> execute(array(
        ':email' => $email,
        ':password' => $password
      ));
      $result = $statement -> fetch();

      if ($result !== false){
        $_SESSION['email'] = $result->email;
        header('location: .php');
      }else{
        $error .= '<i>This account no exist</i>';
      }
  }


  require_once 'view/login.php';
?>
