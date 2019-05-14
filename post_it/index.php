<?php
  require_once 'component/User.php';
  session_start();

  if(isset($_SESSION['email'])){
    try {
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        if($_POST['function'] == 'newNote'){
          $user -> newNote();
          require_once 'view/user_view.php';
        }elseif ($_POST['function'] == 'delete') {
          for ($i=0; $i < count($user -> getNotes()); $i++) {
            if($user -> getNotes()[$i] -> getId() == $_POST['id-note']){
              $user -> getNotes()[$i] -> delete();
              break;
            }
          }
          echo json_encode(array('idNote' => $_POST['id-note'], 'success' => true));
        }elseif ($_POST['function'] == 'save') {
          for ($i=0; $i < count($user -> getNotes()); $i++) {
            if($user -> getNotes()[$i] -> getId() == $_POST['id-note']){
              $user -> getNotes()[$i] -> setTitle($_POST['title']);
              $user -> getNotes()[$i] -> setContent($_POST['content']);
              $user -> getNotes()[$i] -> save();
              break;
            }
          }
          require_once 'view/user_view.php';
        }
        $_POST['function'] = null;
      }else {
        $user = new User($_SESSION['id'], $_SESSION['name'], $_SESSION['email']);
        $_SESSION['user'] = $user;
        require_once 'view/user_view.php';
      }
    } catch (\Exception $e) {
      $e->getMessage();
    }

  }else {
    header ('location: ../index.php');
  }

?>
