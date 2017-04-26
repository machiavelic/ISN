<?php
session_start();
//Les variables
$user = 'Parie_Pro';
$password_definit = '123456789';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username && $password) {
    if ($username == $user && $password == $password_definit) {

      $_SESSION['username'] = $username;
      header('location: admin.php');

    }else {
      echo "Vous n'avez pas mis les bon mdp";
    }
  }else {
    echo "Veuillez remplir tous les champs";
  }
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Resto Good</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/css/style.css" media="screen" title="no title" charset="utf-8">
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">

  </head>
  <body>
    <h1>Administration-Connexion</h1>
    <form class="#" action="#" method="post">
      <h3>Pseudo : </h3><input type="text" name="username" value=""><br><br>
      <h3>Mot de passe : </h3><input type="password" name="password" value=""><br><br>
      <input type="submit" name="submit">
    </form>
  </body>
</html>
