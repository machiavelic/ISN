 <?php
  require_once 'includes/header.php';
  $bdd = new PDO("mysql:host=localhost;dbname=paris;charset=utf8", "root", "");

  $requete = $bdd->query("SELECT * FROM days");

  while($resultat = $requete->fetch()){?>
    <div class="paris">
      <h2 style="margin:20px 0px;">Nos paris du jour <?php echo $resultat['ladate'] ?>: </h2>
      <ul>
        <li><h2>Paris n° <? echo $resultat['id']?> :</h2></li>
        <li><?php echo $resultat['description']?></li>
        <li class="tarif"><h3>cote à <?php echo $resultat['cote'] ?></h3></li>
      </ul>
      </div>
  <?php }

?>
