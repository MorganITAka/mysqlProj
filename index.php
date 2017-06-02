<?php
  session_start();
  if($_SESSION['isConnected'] == True) {
    // Do nothing
  } else {
    header('Location: loginRegister.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Video Games CRUD</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <ul id="main-menu">
      <li><a href="list.php">Lister</a></li>
      <li><a href="add.php">Ajouter</a></li>
      <li><a href="delete.php">Supprimer</a></li>
      <li><a href="update.php">Updater</a></li>
      <li><a href="function/disconnect.php">Disconnect</a></li>
    </ul>
  </body>
</html>
