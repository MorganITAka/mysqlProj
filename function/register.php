<?php
$db = new PDO('mysql:host=localhost;dbname=video_games', 'root', '0000');

$user = $db->prepare('SELECT * FROM users WHERE username = :username');
$user->bindParam(':username', $_POST['username']);
$user->execute();
if($user->fetch() == False) {
  // Create account
  $newUser = $db->prepare('INSERT INTO users (`username`, `password`) VALUES (:username, :password)');
  $newUser->bindParam(':username', $_POST['username']);
  $newUser->bindParam(':password', $_POST['password']);
  $newUser->execute();
  header('Location: /index.php');
} else {
  header('Location: /index.php');
}
?>
