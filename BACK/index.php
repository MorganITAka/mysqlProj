<?php
  $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
  // Recupere tout le contenu de tout les jeux
  $games = $db->prepare('SELECT title, description, release_date, name as editor
FROM video_games, editors
WHERE video_games.id_editor = editors.id;');
  $games->execute();

  // Recupere l'id et le titre de tout les jeux
  $gameList = $db->prepare('SELECT id, title FROM video_games.video_games');
  $gameList->execute();

  // Recupere l'id et le titre de tout les jeux
  $gameListUpdate = $db->prepare('SELECT id, title FROM video_games.video_games');
  $gameListUpdate->execute();

  // Recupere tout les editeurs
  $editorList = $db->prepare('SELECT * FROM video_games.editors');
  $editorList->execute();


?>
<table>
  <tr>
    <th>Nom</th>
    <th>Description</th>
    <th>Editeur</th>
    <th>Date de sortie</th>
  </tr>
  <?php
  foreach ($games->fetchAll() as $key => $value) {
    echo "<tr>";
      echo "<td>" . $value["title"] . "</td>";
      echo "<td>" . $value["description"] . "</td>";
      echo "<td>" . $value["editor"] . "</td>";
      echo "<td>" . $value["release_date"] . "</td>";
    echo "</tr>";

  }
  ?>
</table>
<form method="post" action="scripts/db/delete.php">
  <select name="game_to_delete">
    <?php
      foreach ($gameList->fetchAll() as $value) {
        echo "<option value='" . $value['id'] . "'>" . $value['title'] . "</option>";
      }
    ?>
  </select>
  <input type="submit" value="Supprimer">
</form>

<form method="post" action="templates/updateForm.php">
  <select name="game_to_update">
    <?php
      foreach ($gameListUpdate->fetchAll() as $value) {
        echo "<option value='" . $value['id'] . "'>" . $value['title'] . "</option>";
      }
    ?>
  </select>
  <input type="submit" value="Updater">
</form>


<form method="post" action="scripts/db/insert.php">
  <label>Titre : </label>
  <input type="text" required="true" name="title">
  <label>Description : </label>
  <input type="text" name="description">
  <label>Editeur : </label>
  <select name="editor" required="true">
    <?php
      foreach ($editorList->fetchAll() as $value) {
        echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
      }
    ?>
  </select>
  <label>Date de sortie : </label>
  <input type="number" name="release_date">

  <input type="submit" value="Ajouter">
</form>
