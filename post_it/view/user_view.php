<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to your post it</title>
    <link rel="stylesheet" href="view/css/style.css">
    <script type="text/javascript" src="view/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="view/js/delete.js" language="javascript"></script>
  </head>
  <body>
    <header>
      <h1>Post It</h1>
      <h3>Welcome <?php echo $user -> getName() ?></h3>
      <a href="../login/close_session.php">Close Session</a>
    </header>

    <div class="board">
      <div class="option">
        <form class="form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
          <input type="submit" name="function" value="newNote">
        </form>
      </div>
      <div class="notes">
        <?php
          $notes = $user -> getNotes();
          for ($i=0; $i < count($notes); $i++) {
            require 'view/note_view.php';
          }
        ?>
      </div>
    </div>
    <script src="view/js/color.js" language="javascript" charset="utf-8"></script>
    <script src="view/js/save.js" language="javascript" charset="utf-8"></script>
  </body>
</html>
