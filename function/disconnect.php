<?php
  session_start();
  unset($_SESSION['isConnected']);
  header('Location: /index.php');
?>
