<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to your post it</title>
  </head>
  <body>
    <header>
      <h1>Post It</h1>
      <h3>Welcome <?php echo $user -> getName() ?></h3>
      <a href="../login/close_session.php">Close Session</a>
    </header>

    <div class="board">
      <div class="option">
        <input type="button" id="new_note" name="newNote" value="newNote">
      </div>
      <div class="notes">
        <?php
          $notes = $user -> getNotes();
          for ($i=0; $i < count($notes); $i++) {
            require 'note_view.php';
          }
        ?>
      </div>
    </div>
    <script src="js/user.js" language="javascript" charset="utf-8"></script>
  </body>
</html>
