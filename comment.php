<?php require("includes/header.php"); ?>
<?php require("includes/db.php");
require 'includes/functions.php';
logged_only();?>

<style>
.thumbnail {
  padding:0px;
}
.panel {
position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
position:absolute;
top:11px;left:-16px;
right:100%;
width:0;
height:0;
display:block;
content:" ";
border-color:transparent;
border-style:solid solid outset;
pointer-events:none;
}
.panel>.panel-heading:after{
border-width:7px;
border-right-color:#f7f7f7;
margin-top:1px;
margin-left:2px;
}
.panel>.panel-heading:before{
border-right-color:#ddd;
border-width:8px;
}
</style>
<?php
if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['post'])) {
    if (!empty(trim($_POST['comment']))) {
        $q = $pdo->prepare("INSERT INTO comment(user_id, comment) VALUES(:id, :comment)");
        $q->execute([
      'id' => $_SESSION['auth']->id,
      'comment' => $_POST['comment']
    ]);

        header("Location: comment.php");
    } else {
        $erreur = "Veullez remplire le champs commentaire !";
    }
}


?>

  <h1>Commentaires</h1>
<p>&nbsp;</p>
<div class="col-md-12">
  <form method="POST">
    <textarea class="form-control" name="comment" style="height:100px;margin-bottom:5px;"></textarea><br/>
    <input type="submit" class="btn btn-info" style="width:100%;" name="post">

  </form>

<hr/>
<?php

$q = $pdo->prepare("SELECT * FROM comment ORDER BY id DESC");
$q->execute();
$comments = $q->fetchAll(PDO::FETCH_OBJ);


foreach ($comments as $comment) {
  $q = $pdo->prepare("SELECT username FROM users WHERE id = :id");
  $q->execute(['id' => $comment->user_id]);

  if($q->rowCount()){
    $user_info_comment = $q->fetch(PDO::FETCH_OBJ);
    $pseudo_comment = $user_info_comment->username;
  }else{
    $pseudo_comment = "Compte spprimé";
  }


  ?>

  <div class="row">
    <div class="col-sm-1">
      <div class="thumbnail">
        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
      </div><!-- /thumbnail -->
    </div><!-- /col-sm-1 -->

    <div class="col-sm-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong><?= $pseudo_comment ?></strong> <span class="text-muted"></span>
        </div>
        <div class="panel-body" style="color:black;">
          <?= nl2br(htmlentities($comment->comment)).'<br/>'; ?>
        </div><!-- /panel-body -->
      </div><!-- /panel panel-default -->
    </div><!-- /col-sm-5 -->
  </div>
  <p>&nbsp;</p>
  <?php
}


?>
</div>
<?php require("includes/footer.php"); ?>
