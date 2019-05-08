<?php
  require_once '../database/database.php';
  $db = new DB();

  if (isset($_SESSION['email'])) {
    require_once 'session.php';
  }

  $answer = '';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (empty($name) or empty($email) or empty($password)) {
      $answer = '<i>Rellena todos los capos</i>';
    }else {
      if(!existUser($email)){
        $statement = $db -> connect() -> prepare('INSERT INTO `PostIt`.`Users` (`name`, `email`, `password`) VALUES (:name, :email, :password)');
        $statement -> execute(array(
          ':name' => $name,
          ':email' => $email,
          ':password' => $password
        ));
        $answer = 'Estas registrado';
      }else {
        $answer = 'Ya existe un usuario con este correo';
      }
    }
  }


  function existUser($email){
    $validate = false;
    $statement = $db -> connect() -> prepare('SELECT count(*) AS userCounts FROM PostIt.Users WHERE Users.email = :email');
    $statement -> execute(array(':email' => $email));
    $result = $statement -> fetch();

    if(($result->userCounts) >= 1){
      $validate = true;
    }else {
      $validate = false;
    }

    return $validate;
  }
  require_once 'view/sign_up.php';
?>
