<?php
  echo require_once 'User.php';
  session_start();
  if(isset($_SESSION['user'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $user = $_SESSION['user'];
      if($_POST['newNote'] == 'newNote'){
        echo 'hola';
        // $client -> newNote();
        // $notes = $client -> getNotes();
        // $i = count($notes-1);
        // echo require_once 'view/note_view.php';
        // echo $_SESSION['email'];
      }
  //     }elseif ($_POST['function'] == 'save') {
  //
  //     }elseif ($_POST['function'] == 'delete') {
  //
  //     }
    }
  }
?>
