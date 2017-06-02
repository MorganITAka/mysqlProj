<?php
  var_dump($_POST);
  $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
  // Recupere tout le contenu de tout les jeux
  $game = $db->prepare('UPDATE video_games.video_games
    SET title = :title,
    description = :description,
    id_editor = :id_editor,
    release_date = :release_date
    WHERE id = :id');
  $game->bindParam(':title', $_POST['title']);
  $game->bindParam(':description', $_POST['description']);
  $game->bindParam(':id_editor', $_POST['editor']);
  $game->bindParam(':release_date', $_POST['release_date']);
  $game->bindParam(':id', $_POST['id']);

  $game->execute();

  header('Location: ../../index.php');
?>
