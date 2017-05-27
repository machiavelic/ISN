<?php require("includes/header.php"); ?>
<?php require("includes/db.php");

  $q = $pdo->prepare("SELECT username FROM users");
  $q->execute([]);

  $d = $q->rowCount();
  $users = $q->fetchAll(PDO::FETCH_OBJ);



?>

<h2>Nous avons actuellement : <?php echo $d ?> membres</h2>

<h1 style="text-align:left;margin-left:10px;">Les membres</h1>

<p style="text-align:left;margin-left:10px;">
  <?php


  for ($i=0; $i < count($users); $i++) {
    echo htmlentities($users[$i]->username) . '<br>';
  }
  ?>


</p>






<?php require("includes/footer.php"); ?>
