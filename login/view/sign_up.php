<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <a href="#">
        <h1>Post It</h1>
      </a>
      <nav>
        <ul>
          <li><a href="#">Login</a></li>
          <li><a href="#">Register</a></li>
        </ul>
      </nav>
    </header>
    <h1>Sign Up</h1>
    <form class="" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <label for="name">Name</label>
      <input type="name" name="" value="">
      <label for="">email</label>
      <input type="email" name="" value="">
      <label for="">password</label>
      <input type="password" name="" value="">
      <button type="submit" name="button">sign up</button>
    </form>
  </body>
</html>
