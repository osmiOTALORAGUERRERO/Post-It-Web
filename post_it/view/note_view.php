<style media="screen">
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
    <form class="form" method="post">
      <button type="submit" name="save" class="save" onclick="">Save</button>
      <button type="submit" name="delete" class="delete" onclick="">Delete</button>
      <button type="submit" name="color" class="color" onclick="">Color</button>
    </form>
  </div>
  <div class="body">
    <input  class="title" type="text" value="<?php echo $notes[$i] -> getTitle(); ?>">
    <textarea class="content" rows="15" cols="33"><?php echo $notes[$i] -> getContent(); ?></textarea>
  </div>
</div>
