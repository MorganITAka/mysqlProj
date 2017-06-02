<?php
  require_once('baseFunctions.php');
  insertOneGame($_POST);
  header('Location: /list.php');
?>
