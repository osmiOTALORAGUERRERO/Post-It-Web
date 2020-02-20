<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="view/login.css">
  </head>
  <body>

    <header>
      <a href="#">
        <h1>Post It</h1>
      </a>
      <nav>
        <ul>
          <li><a href="#">Login</a></li>
          <li><a href="../login/sign_up.php">Register</a></li>
        </ul>
      </nav>
    </header>

    <div class="content">
      <h1>Login</h1>
      <form class="login" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
        <label for="email">email</label>
        <input type="email" name="email" value="">
        <label for="password">password</label>
        <input type="password" name="password" value="">
        <?php if(!empty($answer)): ?>
          <div class="mensaje">
            <?php echo $answer; ?>
          </div>
        <?php endif; ?>
        <button type="submit" name="button">login</button>
      </form>
    </div>
  </body>
</html>
