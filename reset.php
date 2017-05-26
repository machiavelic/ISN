<?php
if (isset($_GET['id']) && isset($_GET['token'])) {
  require_once('includes/db.php');
  require_once('includes/functions.php');
  $req = $pdo->prepare('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
  $req->execute([$_GET['id'], $_GET['token']]);
  $user = $req->fetch();
  if ($user) {
    if(!empty($_POST)){
            if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
                session_start();
                $_SESSION['flash']['success'] = 'Votre mot de passe a bien été modifié';
                $_SESSION['auth'] = $user;
                header('Location: account.php');
                exit();
            }
        }
    }else{
        session_start();
        $_SESSION['flash']['error'] = "Ce token n'est pas valide";
        header('Location: login.php');
        exit();
    }
}else{
    header('Location: login.php');
    exit();
}
?>
<?php require_once 'includes/header.php';?>

<h1>Reinitialiser le mot de passe</h1>

<form class="#" action="" method="post">

  <div class="form-group">
    <label for="">Mot de passe</a></label>
    <input type="password" name="password" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Confirmation du mot de passe</a></label>
    <input type="password" name="password_confirm" class="form-control" >
  </div>

<button type="submit" class="btn btn-primary" style="margin-right: 378px;">Reinitialiser mon mot de passe</button>

</form>

<?php require 'includes/footer.php' ?>
