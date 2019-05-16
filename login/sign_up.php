<?php
  session_start();

  require_once '../database/database.php';
  $db = new DB();

  if (isset($_SESSION['email'])) {
    header('location: session.php');
  }

  $answer = '';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (empty($name) or empty($email) or empty($password)) {
      $answer .= '<i>Rellena todos los capos</i>';
    }else {
      if(existUser($email) != true ){
        try {
          $statement = $db -> connect() -> prepare('INSERT INTO Users (idUser, name, email, password) VALUES (null, :name, :email, :password)');
          $statement -> execute(array(
            ':name' => $name,
            ':email' => $email,
            ':password' => $password
          ));
          $statement = $db -> connect() -> prepare('SELECT idUser FROM Users WHERE email = :email');
          $statement -> execute(array(
            ':email' => $email
          ));
          $result = $statement -> fetch();
          $answer .= '<i>Estas registrado</i>';
          $_SESSION['id'] = $result['idUser'];
          $_SESSION['name'] = $name;
          $_SESSION['email'] = $email;
          header ('location: ../post_it/index.php');
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
      }else {
        $answer .= '<i>Ya existe un usuario con este correo</i>';
      }
    }
  }

  function existUser($email){
    $db = new DB();
    $validate = false;
    $statement = $db -> connect() -> prepare('SELECT count(*) AS userCounts FROM Users WHERE email = :email');
    $statement -> execute(array(':email' => $email));
    $result = $statement -> fetch();
    if($result['userCounts'] >= 1){
      $validate = true;
    }else {
      $validate = false;
    }
    return $validate;
  }
  require_once 'view/sign_up.php';
?>
