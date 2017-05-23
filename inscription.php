<?php require_once('includes/functions.php'); ?>
<?php
session_start();
if (!empty($_POST)) {
    $errors = array();
    require_once 'includes/db.php';

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
        $errors['username'] = 'Votre pseudo n\'est pas valide(alphanumérique)';
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if ($user) {
            $errors['username'] = "Votre pseudo est déjà pris";
        }
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Votre email n'est pas valide";
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if ($user) {
            $errors['email'] = 'Cette email est déjà utilisé pour un autre compte';
        }
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors['password'] = "Vos mot de passe ne sont pas valide";
    }

    if (empty($errors)) {
        $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = str_random(60);
        $req->execute([$_POST['username'], $password,$_POST['email'], $token]);
        $user_id = $pdo->lastInsertID();
        $_SESSION['flash']['success'] = "Veuillez cliquez sur ce lien pour confirmer votre inscription<br><a href=\"confirm.php?id=$user_id&token=$token\">127.0.0.1/paris/confirm.php?id=$user_id&token=$token</a>";
    }
}
?>


  <?php require_once 'includes/header.php';?>
  <h1>S'inscrire</h1>
  <?php if (!empty($errors)):?>

    <div class="alert alert-danger" style="width:80%;">
      <p>
        Vous n'avez pas rempli le formulaire corectement
      </p>
      <ul>
        <?php foreach ($errors as $error):?>
            <li><?= $error ; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif;  ?>
  <div class="#" style="width:30%;">


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
      <input type="password" name="password_confirm" class="form-control" >
    </div>

  <button type="submit" class="btn btn-primary" style="margin-right: 378px;">Envoyer</button>

  </form>
</div>





<br><br><br><br>
<?php require_once 'includes/footer.php'; ?>
