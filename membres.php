<?php require("includes/header.php"); ?>
<?php require("includes/db.php"); ?>


<h1>Les membres</h1>
<?php

$q = $pdo->prepare("SELECT username FROM users");
$q->execute([]);

$users = $q->fetchAll(PDO::FETCH_OBJ);

for ($i=0; $i < count($users); $i++) {
  echo htmlentities($users[$i]->username) . '<br>';
}
?>






<?php require("includes/footer.php"); ?>
