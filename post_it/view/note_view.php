<div id="<?php echo $notes[$i] -> getId(); ?>" class="note">
  <div class="header">
    <form class="form-save" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <input type="hidden" name="id-note" value="<?php echo $notes[$i] -> getId(); ?>">
      <input class="save" type="submit" name="function" value="save">
    </form>
    <form class="form-delete" method="post">
      <input type="hidden" name="id-note" value="<?php echo $notes[$i] -> getId(); ?>">
      <input type="submit" name="function" value="delete">
    </form>
    <button type="button" name="function" class="function-note" onclick="">Color</button>
  </div>
  <div class="body">
    <input class="title" type="text" value="<?php echo $notes[$i] -> getTitle(); ?>" placeholder="Title">
    <textarea class="content" rows="15" cols="40"><?php echo $notes[$i] -> getContent(); ?></textarea>
  </div>
</div>
