<?php

session_start();


if (isset($_SESSION['username'])) {
  if (isset($_GET['action'])) {
    if($_GET['action'] == 'add'){
      if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        if ($title && $description && $price) {

          $bdd = new PDO("mysql:host=localhost;dbname=paris;charset=utf8", "root", "");

          $requete = $bdd->query("SELECT * FROM days");

          while($resultat = $requete->fetch()){

?>
          <ul>
            <li><h2>Paris n°<?php echo $resultat['id']; ?>:</h2></li>
            <li><?php echo $resultat['description']; ?></li>
            <li class="tarif"><h3>cote à <?php echo $resultat['cote']; ?></h3></li>
          </ul><?php
        }
        }else {
          echo "Veuillez remplir tous les champs";
        }

      }
?>

  <form class="#" action="" method="post">
  <h3>Titre du produit :<br><br> <input type="text" name="title"></h3><br><br>
  <h3>Description du produit :<br><br> <input type="text" name="description"></h3><br><br>
  <h3>Prix :<br><br> <input type="text" name="price"></h3><br><br>
  <input type="submit" name="submit" >
  </form>

  <?php
    }elseif ($_GET['action'] == 'modify') {
      # code...
    }elseif ($_GET['action'] == 'delete') {
      # code...
    }else {
      die('Il y a eu une erreur');
    }
  }else {

  }
  }else {
    header('location: ../index.php');
  }


   ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Administration</title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel="stylesheet" href="styles/css/style.css" media="screen" title="no title" charset="utf-8">
     <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
   </head>
   <body>
     <h1>C'est ici qu'on entre les pronos</h1>
     <form class="#" action="" method="post">
       <input type="text" name="ladate" value="" placeholder="Date"><br><br>
       <input type="text" name="match1" value="" placeholder="match"><br><br>
       <input type="text" name="match2" value="" placeholder="match"><br><br>
       <input type="text" name="match3" value="" placeholder="match"><br><br>
       <input type="text" name="match4" value="" placeholder="match"><br><br>
       <input type="text" name="cote" value="" placeholder="cote"><br>
       <input type="submit" value="Envoyer">
     </form>
     <?php


     if (isset($_POST['ladate'])) {
       $ladate = $_POST['ladate'];
     }

     if(isset($_POST['match1'])){
       $match1 = $_POST['match1'];
     }

     if(isset($_POST['match2'])){
       $match2 = $_POST['match2'];
     }

     if(isset($_POST['match3'])){
      $match3 = $_POST['match3'];
     }

     if(isset($_POST['match4'])){
      $match3 = $_POST['match4'];
     }

     if (isset($_POST['cote'])) {
       $cote = $_POST['cote'];
     }


     $bdd = new PDO("mysql:host=localhost;dbname=paris;charset=utf8", "root", "");

     if(isset($_POST['match1']) AND isset($_POST['cote']) AND isset($_POST['ladate']) AND isset($_POST['match2']) AND isset($_POST['match2']) AND isset($_POST['match4'])){

     $requete = $bdd->prepare("INSERT INTO lesparis2(match1,cote,ladate, match2, match3, match4)
      VALUES('$match1', '$cote', '$ladate', '$match2', '$match3', 'match4')");
     $requete->execute(array($_POST['match1'], $_POST['cote'],$_POST['ladate'], $_POST['match2'], $_POST['match3'], $_POST['match4']));

     }
?>

   </body>
 </html>
