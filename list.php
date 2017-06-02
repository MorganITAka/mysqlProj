<?php
  require_once("function/baseFunctions.php");
  $games = getAllItems();
?>
<link rel="stylesheet" href="css/style.css">
<a href="/">Accueil</a>
<h1>Liste</h1>
<table id="list-table">
  <tr>
    <th>Titre</th>
    <th>Date</th>
    <th>Editeur</th>
    <th>Genre</th>
  </tr>
  <?php
    foreach ($games as $value) {
      echo "<tr>";
      echo "<td>" . $value['title'] . "</td>";
      echo "<td>" . $value['release_date'] . "</td>";
      echo "<td>" . $value['editor'] . "</td>";
      echo "<td>" . $value['genre'] . "</td>";
      echo "</tr>";
    }
  ?>
</table>
