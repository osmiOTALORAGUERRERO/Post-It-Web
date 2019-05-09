<?php
  session_start();

  require_once '../database/database.php';
  $db = new DB();

  if (isset($_SESSION['email'])) {
    header('location: session.php');
  }

  $answer = '';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
      $statement = $db -> connect() -> prepare('SELECT * FROM Users WHERE email = :email');
      $statement -> execute(array(
        ':email' => $email
      ));
      $result = $statement -> fetch();

      if ($result != false){
        if(password_verify($password, $result['password'])){
          $_SESSION['email'] = $result['email'];
          header ('location: ../post_it/index.php');
        }else {
          $answer .= '<i>incorrect email or password</i>';
        }
      }else{
        $answer .= '<i>This account with this email no exist</i>';
      }

    } catch (\Exception $e) {
      echo $e -> getMessage();
    }
  }


  require_once 'view/login.php';
?>
