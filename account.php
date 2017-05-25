<?php session_start();
require 'includes/functions.php';
logged_only();
if (!empty($_POST)) {
  if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
    $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
  }else {
    $user_id = $_SESSION['auth']->id;
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    require_once 'includes/db.php';
    $pdo->prepare('UPDATE users SET password = ?')->execute([$password]);
    $_SESSION['flash']['success'] = "Votre mot de passe à bien été mis à jour";
  }
}
?>
<?php require 'includes/header.php' ?>

<h1>Bonjour <?= $_SESSION['auth']->username;?></h1>

<form action="" method="post">
  <div class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe">
  </div>
  <div class="form-group">
    <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du nouveau mot de passe">
  </div>
  <button class="btn btn-primary">Changer mot de passe</button>
</form>



<?php require 'includes/footer.php' ?>
