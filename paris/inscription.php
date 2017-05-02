<?php require_once 'includes/header.php'; ?>

<?php

if (!empty($_POST)) {

  $errors = array();

  if (empty($_POST['username']) || !preg_match('/^[a-z0-9_]+$/', $_POST['username'])) {
    $errors['username'] = 'Votre pseudo n\'est pas valide(alphanumérique)';
  }

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
  $errors['email'] = "Votre email n'est pas valide";
}

debug($errors);

}


?>

<h1>S'inscrire</h1>

<form class="#" action="" method="post">

  <div class="form-group">
    <label for="">Pseudo</label>
    <input type="text" name="username" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">email</label>
    <input type="text" name="email" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Mot de passe</label>
    <input type="password" name="password" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Confirmer le mot de passe </label>
    <input type="password" name="confirm_password" class="form-control" >
  </div>

<button type="submit" class="btn btn-primary">Envoyer</button>

</form>




<br><br><br><br>
<?php require_once 'includes/footer.php'; ?>
