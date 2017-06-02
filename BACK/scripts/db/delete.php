<?php
  $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
  $deleteGame = $db->prepare("DELETE FROM `video_games`.`video_games` WHERE `id`= :toDelete;");
  $deleteGame->bindParam(':toDelete', $_POST['game_to_delete']);
  $deleteGame->execute();

  header('Location: ../../index.php');
?>
