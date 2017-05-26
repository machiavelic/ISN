<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Predi FOOT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/css/style.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="styles/css/slider.css" media="screen" title="no title" charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
    .btn{
      margin-left: 0px;
      margin-top: 0px;
    }
    </style>
  </head>
  <body>

    <header class="header" style="margin-top:0px;padding-top:0px">
      <a href="index.php" class="header_logo">Predi FOOT</a>
      <nav class="menu">
        <div class="gauche">
          <a href="index.php" >Accueil</a>
          <a href="paris.php">Nos Predictions</a>
          <a href="APropos.php">A Propos</a>
          <a href="contact.php">Contact</a>
          <a href="comment.php">Commentaire</a>
        </div>
        <div class="droite">
          <?php  if(isset($_SESSION['auth'])): ?>
          <a href="logout.php">Déconnexion</a>
          <?php else: ?>
          <a href="login.php">Identification</a>
          <a href="inscription.php">Inscription</a>
        <?php endif; ?>
        </div>
      </nav>
    </header>
<div class="container">
  <?php if (isset($_SESSION['flash'])): ?>
    <?php foreach($_SESSION['flash'] as $type => $message): ?>
      <div class="alert alert-<?= $type;?>">
        <?= $message; ?>
      </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>
</div>
