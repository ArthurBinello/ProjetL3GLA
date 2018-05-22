<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" />
 	<title>Sortie à Paris</title>
	<body>
<?php

include 'bd.php';



//si l'utilisateur sortie avec plusieurs amis et engregister les infos dans le BD
//creer 2 tableau pour enregistrer les noms et les adresses

$nom=array();
$adr=array();

$i=0;

$nom[$i]=$_POST["nom_0"];
$adr[$i]=$_POST["adr_0"];

while($nom[$i]!=''&&$adr[$i]!=''){
	
	//tester si ca marche bien
	//echo $nom[$i];
	//echo $adr[$i];
	$i++;
	
    if((!isset($_POST["nom_".$i]))||(!isset($_POST["adr_".$i]))){
		break;
	}else{
		$nom[$i]=$_POST["nom_".$i];
		$adr[$i]=$_POST["adr_".$i];
	}
	
	
}


$transport=$_POST["transport"];
$date=$_POST["date"];
$heure=$_POST["heure"];
$minute=$_POST["minute"];
$duree=$_POST["duree"];
$preference=$_POST["preference"];





?>
<form action="resultat.php" method="post">
<p><input type="submit" value="Validez" class="btn"></p>
</form>
</body>
</html>