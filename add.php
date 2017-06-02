<?php
  require_once("function/baseFunctions.php");
  $editors = getAllEditors();
  $genres = getAllGenres();
?>
<form method="post" action="function/insert.php">
  <label>Titre : </label>
  <input type="text" required="true" name="title">
  <label>Description : </label>
  <input type="text" name="description">
  <label>Editeur : </label>
  <select name="editor" required="true">
    <?php
      foreach ($editors as $value) {
        echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
      }
    ?>
  </select>
  <label>Genre : </label>
  <select name="genres[]" multiple>
    <?php
      foreach ($genres as $value) {
        echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
      }
    ?>
  </select>
  <label>Date de sortie : </label>
  <input type="number" name="release_date">

  <input type="submit" value="Ajouter">
</form>
