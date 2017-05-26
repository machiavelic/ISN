<?php
session_start();
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
  <div class="container">
      <div class="row">
          <div class="col-md-3">
              <ul class="nav nav-pills nav-stacked admin-menu">
                  <li class="active"><a href="#" data-target-id="home"><i class="fa fa-home fa-fw"></i>Home</a></li>
                  <li><a href="#" data-target-id="Profile"><i class="fa fa-list-alt fa-fw"></i>Mes informations</a></li>
                  <li><a href="#" data-target-id="Activity"><i class="fa fa-key" aria-hidden="true"></i>Changer le mot de passe</a></li>
                  <li><a href="#" data-target-id="Settings"><i class="fa fa-cogs fa-fw"></i>Settings</a></li>
              </ul>
          </div>
          <div class="col-md-9 well admin-content" style="color:black;" id="home">
              <p>
                  Bienvenue chez Predi FOOT<br>
                  It is for users, which use one-page layouts.
              </p>
          </div>
          <div class="col-md-9 well admin-content" style="color:black;" id="Profile">
              Pseudo : <?= $_SESSION['auth']->username;?><br>
              email : <?= $_SESSION['auth']->email;?>
          </div>
          <div class="col-md-9 well admin-content" id="Activity">
              <div class="#" style="width:30%;">
                <form action="" method="post">
                  <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du nouveau mot de passe">
                  </div>
                  <button class="btn btn-primary">Changer mot de passe</button>
                </form>

              </div>
          </div>
          <div class="col-md-9 well admin-content" id="Settings">
              Settings
          </div>
      </div>
  </div>





<?php require 'includes/footer.php' ?>
