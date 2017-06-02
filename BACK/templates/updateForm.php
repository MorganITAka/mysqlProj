<?php
  $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
  // Recupere tout le contenu de tout les jeux
  $game = $db->prepare('SELECT * FROM video_games.video_games WHERE id = :toUpdate;');
  $game->bindParam(':toUpdate', $_POST['game_to_update']);
  $game->execute();


  // Recupere tout les editeurs
  $editorList = $db->prepare('SELECT * FROM video_games.editors');
  $editorList->execute();

  $gameToUpdate = $game->fetch();
?>

<form method="post" action="../scripts/db/update.php">
  <input type="hidden" name="id" value="<?php echo $gameToUpdate['id']; ?>">
  <label>Titre : </label>
  <input type="text" required="true" name="title" value="<?php echo $gameToUpdate['title']; ?>">
  <label>Description : </label>
  <input type="text" name="description" value="<?php echo $gameToUpdate['description']; ?>">
  <label>Editeur : </label>
  <select name="editor" required="true">
    <?php
      foreach ($editorList->fetchAll() as $value) {
        if($gameToUpdate['id_editor'] == $value['id']) {
          echo "<option selected='selected' value='" . $value['id'] . "'>" . $value['name'] . "</option>";
        } else {
          echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
        }
      }
    ?>
  </select>
  <label>Date de sortie : </label>
  <input type="number" name="release_date" value="<?php echo $gameToUpdate['release_date']; ?>">

  <input type="submit" value="Updater">
</form>
