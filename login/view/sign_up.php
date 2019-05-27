<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="view/login.css">
  </head>
  <body>
    <header>
      <a href="#">
        <h1>Post It</h1>
      </a>
      <nav>
        <ul>
          <li><a href="../login/login.php">Login</a></li>
          <li><a href="#">Register</a></li>
        </ul>
      </nav>
    </header>
    <div class="content">
      <h1>Sign Up</h1>
      <form class="sign_up" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
        <label for="name">Name</label>
        <input type="name" name="name" value="">
        <label for="">email</label>
        <input type="email" name="email" value="">
        <label for="">password</label>
        <input type="password" name="password" value="">
        <?php if(!empty($answer)): ?>
          <div class="mensaje">
            <?php echo $answer; ?>
          </div>
        <?php endif; ?>
        <button type="submit" name="button">sign up</button>
      </form>
    </div>
  </body>
</html>
