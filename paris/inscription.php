<?php require_once 'includes/header.php'; ?>



<h1>S'inscrire</h1>

<form class="#" action="l" method="post">

  <div class="form-group">
    <label for="">Pseudo</label>
    <input type="text" name="username" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="">email</label>
    <input type="text" name="email" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="">Mot de passe</label>
    <input type="password" name="password" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="">Confirmer le mot de passe </label>
    <input type="password" name="confirm_password" class="form-control" required>
  </div>

<button type="submit" class="btn btn-primary">Envoyer</button>

</form>




<br><br><br><br>
<?php require_once 'includes/footer.php'; ?>
