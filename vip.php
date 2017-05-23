<?php require_once 'includes/header.php'; ?>
<h1>Le VIP</h1>
<div class="descrition">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <ul >
    <li class="tarif"><h3>Prix au mois : 10€</32></li>
    <li class="tarif"><h3>Prix pour six mois : 55€</h3></li>
    <li class="tarif"><h3>Prix à l'année : 100€</h3></li>
  </ul>
</div>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=paris;charset=utf8", "root", "");

$requete = $bdd->query("SELECT * FROM days");

while($resultat = $requete->fetch()){

?>
<ul>
  <li><h2>Paris n°<?php echo $resultat['id']; ?>:</h2></li>
  <li><?php echo $resultat['description']; ?></li>
  <li class="tarif"><h3>cote à <?php echo $resultat['cote']; ?></h3></li>
</ul>
<? } ?>
