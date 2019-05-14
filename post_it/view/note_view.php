<style media="screen">
  form{
    display: inline;
  }
  .note{
    margin: 10px;
    background-color: red;
    display: inline-block;
    text-align: center;
    justify-content: center;
  }
  .header{
    padding: 5px;
    background-color: black;
  }
  .body{
    padding: 5px;
  }
  .title{
    display: block;
  }
</style>
<div id="<?php echo $notes[$i] -> getId(); ?>" class="note">
  <div class="header">
    <form class="form-save" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <input type="hidden" name="id-note" value="<?php echo $notes[$i] -> getId(); ?>">
      <input class="save" type="submit" name="function" value="save">
    </form>
    <form class="form-delete" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <input type="hidden" name="id-note" value="<?php echo $notes[$i] -> getId(); ?>">
      <input type="submit" name="function" value="delete">
    </form>
    <button type="button" name="function" class="function-note" onclick="">Color</button>
  </div>
  <div class="body">
    <input class="title" type="text" value="<?php echo $notes[$i] -> getTitle(); ?>" placeholder="Title">
    <textarea class="content" rows="15" cols="33"><?php echo $notes[$i] -> getContent(); ?></textarea>
  </div>
</div>
