<?php
session_start();
if (!empty($_POST) &&  !empty($_POST['username']) && !empty($_POST['password'])) {
  require_once 'includes/db.php';
  require_once 'includes/functions.php';
  $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username ) AND confirmed_at IS NOT NULL');
  $req->execute(['username' => $_POST['username']]);
  $user = $req->fetch(PDO::FETCH_OBJ);
  if($user){
    if(password_verify($_POST['password'], $user->password)){
      $_SESSION['auth'] = $user;
      $_SESSION['flash']['success'] = 'Vous etes bien connecté';
      header('Location:account.php');
      exit();
    }else{
      $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
    }
  }else{
    $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
  }
} ?>

<?php require_once 'includes/header.php';?>

<h1>Se connecter</h1>
<div class="#" style="width:30%">


<form class="#" action="" method="post">

  <div class="form-group">
    <label for="">Pseudo ou email</label>
    <input type="text" class="form-control" name="username" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Mot de passe <a href="forget.php">(J'ai oublié mon mot de passe)</a></label>
    <input type="password" class="form-control" name="password" class="form-control" >
  </div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="remember" value="1" > Se souvenir de moi
    </label>
  </div>

<button type="submit" class="btn btn-primary" style="margin-right: 378px;margin-bottom:60px;">Se connecter</button>

</form>

</div>

<?php require 'includes/footer.php' ?>
