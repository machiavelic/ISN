<?php
  session_start();
if(!empty($_POST) && !empty($_POST['email'])){
    require_once 'includes/db.php';
    require_once 'includes/functions.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE email = ? AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch(PDO::FETCH_OBJ);
    if($user){
      session_start();
      $reset_token = str_random(60);
      $pdo->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
      $_SESSION['flash']['success'] = 'Les instructions pour votre mots de passe vous ont été envoyé';
      $_SESSION['flash']['success'] = "Veuillez cliquez sur ce lien pour Reinitialiser votre mot de passe<br><a href=\"reset.php?id={$user->id}&token=$reset_token\">127.0.0.1/paris/confirm.php?id=$user_id&token=$token</a>";
      header('Location:login.php');
      exit();
    }else{
      $_SESSION['flash']['danger'] = 'Aucun compte ne correspond a cette email';
    }
}
?>

<?php require_once 'includes/header.php';?>

<h1>Mot de passe oublié</h1>

<form class="#" action="" method="post">

  <div class="form-group">
    <label for="">Email</label>
    <input type="email" name="email" class="form-control" >
  </div>

<button type="submit" class="btn btn-primary" style="margin-right: 378px;">Se connecter</button>

</form>

<?php require 'includes/footer.php' ?>
