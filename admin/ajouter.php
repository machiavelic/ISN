<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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
