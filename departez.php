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
include_once 'calculListe.php';
include_once 'calculMap.php';

$idinv = 0;
$transport=$_POST["transport"];
$date=$_POST["date"];
$heure=$_POST["heure"];
$minute=$_POST["minute"];
$duree=$_POST["duree"];
$preference1=$_POST["preference1"];
$preference2=$_POST["preference2"];
$preference3=$_POST["preference3"];
$lieu1=$_POST["lieu1"];
$lieu2=$_POST["lieu2"];
$lieu3=$_POST["lieu3"];

$h_t_reste = 0;
$m_t_reste = 0;
//si l'utilisateur sortie avec plusieurs amis et engregister les infos dans le BD
//creer 2 tableau pour enregistrer les noms et les adresses
$nom=array();
$adr=array();
$i=0;
array_push($nom, $_POST["nom_0"]);
array_push($adr, $_POST["adr_0"]);

while($nom[$i]!=''&&$adr[$i]!=''){
	
	//tester si ca marche bien
	//echo $nom[$i];
	//echo $adr[$i];
	$i++;
	
    if((!isset($_POST["nom_".$i]))||(!isset($_POST["adr_".$i]))){
		break;
	}else{
		array_push($nom, $_POST["nom_".$i]);
		array_push($adr, $_POST["adr_".$i]);
	}
		
}
/*$transport=$_POST["transport"];
$date=$_POST["date"];
$heure=$_POST["heure"];
$minute=$_POST["minute"];
$duree=$_POST["duree"];
$preference=$_POST["preference"];*/

$type1 = selectType($lieu1, $preference1);
$type2 = selectType($lieu2, $preference2);
$type3 = selectType($lieu3, $preference3);
$centre = centreGeo($adr);
$lat = $centre[0];
$lng = $centre[1];
$sorties = choixSorties($lat, $lng, $type1, $type2, $type3);

function ajouteSortie($sorties){
	function sortie($l_ids, $sorties[0], $sorties[1], $sorties[2]);
}

function ajouteSortant_p1($idsr, $nom, $adr, $transport, $date, $heure, $minute, $duree, $preference1){
	sortir($idsr,$nom,$adr,$transport,$date,$heure,$minute,$duree,$preference1);
	$idsr++;
}

function ajouteSortant_p2($idsr, $nom, $adr, $transport, $date, $heure, $minute, $duree, $preference2){
	sortir($idsr,$nom,$adr,$transport,$date,$heure,$minute,$duree,$preference2);
	$idsr++;
}

function ajouteSortant_p3($idsr, $nom, $adr, $transport, $date, $heure, $minute, $duree, $preference3){
	sortir($idsr,$nom,$adr,$transport,$date,$heure,$minute,$duree,$preference3);
	$idsr++;
}

function ajouteSortant_l1($idsr, $nom, $adr, $transport, $date, $heure, $minute, $duree, $lieu1){
	sortir($idsr,$nom,$adr,$transport,$date,$heure,$minute,$duree,$lieu1);
	$idsr++;
}

function ajouteSortant_l2($idsr, $nom, $adr, $transport, $date, $heure, $minute, $duree, $lieu2){
	sortir($idsr,$nom,$adr,$transport,$date,$heure,$minute,$duree,$lieu2);
	$idsr++;
}

function ajouteSortant_l3($idsr, $nom, $adr, $transport, $date, $heure, $minute, $duree, $lieu3){
	sortir($idsr,$nom,$adr,$transport,$date,$heure,$minute,$duree,$lieu3);
	$idsr++;
}

//Convertir le temps en minute.--la partie de heure.
function h_tempsConvertisseurFromMinute($t){
	return intval($t); //intval小数取整数位。2.3小时返回小时位。
}
//Convertir le temps en minute.--la partie de heure.
function m_tempsConvertisseurFromMinute($t){
	return $t - (intval($t)*60);
}
//Convertir le temps en heure en minute.
function m_tempsConvertisseurToMinute($h_temps, $m_temps){
	return ($h_temps*60)+$m_temps;
}


function calculTempsReste($lieu_actuelle, $h_actuelle, $m_actuelle){
	$t_surplace = "select tempsSurPlace from tempsmoyenleslieux where = $lieu_actuelle";
	$t_actuelle = m_tempsConvertisseurToMinute($h_actuelle, $m_actuelle);
	$t_original = m_tempsConvertisseurToMinute($heure, $minute); //$heure, $minute是全局变量。
	
	//temps deja passé = t_actuelle - t_origine;
	$t_passe = $t_actuelle - $t_original;

	//t_reste = duree - t_passe - t_surplace;
	$t_reste = $duree - $t_passe - $t_surplace;

	return $t_reste; //la valeur de retourne est compté en minute。
}

//Creer une nouvelle activite.
//activite差不多就是lieu.
function CreerNouvelleActivite($ida, $t_reste, $lat, $lng, $lieu, $preference, $transport, $distance){
	//$liste = listRestaurant($lat, $lng, $preference);//obtenir les lieux différents autour du point central.
	//缺少的：把liste和tempsmoyenleslieux里的元素对接起来。
	if($lieu == 'Restaurant'){
		$result = mysql_query("SELECT * FROM tempsmoyenleslieux WHERE preference = $preference");
	}else{
		$result = mysql_query("SELECT * FROM tempsmoyenleslieux WHERE lieuType = $lieu AND preference = NULL");
	}

	//$t_transport = dureeTrajet($transport, $distance);

	while($arr = mysql_fetch_assoc($result)){
		$arrs[] = $arr;
	}

	foreach($arrs as $arr){
		echo $arr['tempsSurPlace'];
		if($ida == 1){
			if($arr['tempsSurPlace']+60 <= $t_reste){
				$typeDeLieu = $arr['lieuType'];
				echo $typeDeLieu;
			}
		}elseif($ida == 2){
			if($arr['tempsSurPlace']+30 <= $t_reste){
				$typeDeLieu = $arr['lieuType'];
				echo $typeDeLieu;
			}
		}elseif($ida == 3){
				if($arr['tempsSurPlace'] <= $t_reste){
					$typeDeLieu = $arr['lieuType'];
					echo $typeDeLieu;
				}else{
					echo "Go home!";
				}
		}
	}

	$liste = choixLieu($lat, $lng, $typeDeLieu);
	return $liste[0];
}

?>
<form action="resultat.php" method="post">
<p><input type="submit" value="Validez" class="btn"></p>
</form>
</body>
</html>