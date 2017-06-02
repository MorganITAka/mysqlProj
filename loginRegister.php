<?php ?>
<h2>Login</h2>
<form method="post" action="function/login.php">
  <label for="username">User : </label>
  <input type="text" name="username" id="username" required="true">

  <label for="password">Password : </label>
  <input type="password" name="password" id="password" required="true">

  <input type="submit" value="login">
</form>

<h2>Register</h2>
<form method="post" action="function/register.php">
  <label for="username">User : </label>
  <input type="text" name="username" id="username" required="true">

  <label for="password">Password : </label>
  <input type="password" name="password" id="password" required="true">

  <input type="submit" value="register">
</form>
