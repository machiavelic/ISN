<?php
if (!empty($_POST) &&  !empty($_POST['username']) && !empty($_POST['password'])) {
  require_once 'includes/db.php';
  require_once 'includes/functions.php';
  $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username ) AND confirmed_at IS NOT NULL');
  $req->execute(['username' => $_POST['username']]);
  $user = $req->fetch();
  if(password_verify($_POST['password'], $user->password)){
    session_start();
    $_SESSION['auth'] = $user;
    $_SESSION['flash']['success'] = 'Vous etes bien connecté';
    header('Location:account.php');
    exit();
  }else{
    $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
  }
} ?>

<?php require_once 'includes/header.php';?>

<h1>Se connecter</h1>

<form class="#" action="" method="post">

  <div class="form-group">
    <label for="">Pseudo ou email</label>
    <input type="text" name="username" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Mot de passe</label>
    <input type="password" name="password" class="form-control" >
  </div>

<button type="submit" class="btn btn-primary" style="margin-right: 378px;">Se connecter</button>

</form>

<?php require 'includes/footer.php' ?>
