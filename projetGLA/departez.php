<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Sortie à Paris</title>
	<body>
<?php

include 'bd.php';



//si l'utilisateur sortie avec plusieurs amis et engregister les infos dans le BD
$i=0;

$nom=$_POST["nom_0"];
$adr=$_POST["adr_0"];
while($nom!=''&&$adr!=''){
	
	echo $nom;
	echo $adr;
	$i++;
	
    if((!isset($_POST["nom_".$i]))||(!isset($_POST["adr_".$i]))){
		break;
	}else{
		$nom=$_POST["nom_".$i];
		$adr=$_POST["adr_".$i];
	}
	
}


$transport=$_POST["transport"];
$date=$_POST["date"];
$heure=$_POST["heure"];
$minute=$_POST["minute"];
$duree=$_POST["duree"];
$preference=$_POST["preference"];



//sortir($nom,$adr,$transport,$date,$heure,$minute,$duree, $preference);

?>
</body>
</html>