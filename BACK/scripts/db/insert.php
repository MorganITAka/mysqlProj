<?php
  $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
  // On prepare l'insertion en inserant des variables temporaires
  $newGame = $db->prepare('INSERT INTO `video_games`.`video_games` (`title`, `description`, `id_editor`, `release_date`) VALUES (:title, :description, :id_editor, :release_date)');
  // On substitue les variables temporaires avec les elements de notre formulaire
  $newGame->bindParam(':title', $_POST['title']);
  $newGame->bindParam(':description', $_POST['description']);
  $newGame->bindParam(':id_editor', $_POST['editor']);
  $newGame->bindParam(':release_date', $_POST['release_date']);
  $newGame->execute();
  header('Location: ../../index.php');
?>
