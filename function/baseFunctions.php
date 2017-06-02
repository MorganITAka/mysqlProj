<?php
  function getAllItems()
  {
    $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
    $games = $db->prepare(
      'SELECT video_games.id,
       title, description,
       release_date,
       genres.name as genre,
       editors.name as editor
      FROM video_games, genres, video_games_genres, editors
      WHERE video_games.id = video_games_genres.id_video_games
      AND genres.id = video_games_genres.id_genres
      AND video_games.id_editor = editors.id;');
    $games->execute();
    $result = [];

    // On parcourt l'array contenant tout nos jeux dupliqués
      // Si le jeu que l'on souhaite inserer n'est pas present dans $result
      // On l'insere
      // Si le jeu que l'on souhaite inserer dans $result est present
      // On ne l'insere pas.


    foreach ($games->fetchAll() as $key => $value) {
      if(count($result) == 0) {
        // $result est vide
        // On insere un jeu
        $result[] = [
          "id" => $value['id'],
          "title" => $value['title'],
          "description" => $value['description'],
          "release_date" => $value['release_date'],
          "genre" => $value['genre']
        ];
      } else {
        // $result n'est pas vide, il contient deja des jeux
        // On doit verifier que le jeu a inserer n'existe pas dans ces jeux deja
        // present
        $flag = False;
        foreach ($result as $cle => $valeur) {
          if($valeur['id'] == $value['id']) {
            // Le jeu a inserer est deja present
            break;
          } else {
            $flag = True;
            //
          }
        }

      }
      $result[] = [
        "id" => $value['id'],
        "title" => $value['title'],
        "description" => $value['description'],
        "release_date" => $value['release_date'],
        "genre" => $value['genre']
      ];
    };
    var_dump($result);die;
    return $games->fetchAll();
  }
  function getAllEditors()
  {
    $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
    $games = $db->prepare('SELECT * FROM editors');
    $games->execute();
    return $games->fetchAll();
  }
  function getAllGenres()
  {
    $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
    $games = $db->prepare('SELECT * FROM genres');
    $games->execute();
    return $games->fetchAll();
  }
  function insertOneGame($gameData)
  {
    $db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');
    // Prepare insertion of new game
    $newGame = $db->prepare('INSERT INTO video_games (title, description, id_editor, release_date) VALUES (:title, :description, :id_editor, :release_date)');
    $newGame->bindParam(':title', $gameData['title']);
    $newGame->bindParam(':description', $gameData['description']);
    $newGame->bindParam(':id_editor', $gameData['editor']);
    $newGame->bindParam(':release_date', $gameData['release_date']);
    $newGame->execute();

    $lastId = $db->lastInsertId();
    foreach ($gameData['genres'] as $value) {
      $game_genre = $db->prepare('INSERT INTO video_games_genres (id_video_games, id_genres) VALUES ( :id_video_games, :id_genres)');
      $game_genre->bindParam('id_video_games', $lastId);
      $game_genre->bindParam('id_genres', $value);
      $game_genre->execute();

    }
  }
?>
