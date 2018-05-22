<?php
session_start();
include 'bd.php';

$idinv = 0;
$nom=$_POST["nom_0"];
$adr=$_POST["adr_0"];
$transport=$_POST["transport"];
$date=$_POST["date"];
$heure=$_POST["heure"];
$minute=$_POST["minute"];
$duree=$_POST["duree"];
$preference=$_POST["preference"];

$h_t_reste = 0;
$m_t_reste = 0;

//需要和阿土合作的：adresse+lieu的functions.
//数据库函数调用系列。
function ajouteSortant($idinv, $nom, $adr, $transport, $date, $heure, $minute, $duree, $preference){
	sortir($idsr,$nom,$adr,$transport,$date,$heure,$minute,$duree,$preference);
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
function CreerNouvelleActivite($ida, $t_reste, $lat, $lng, $preference){
	//$liste = listRestaurant($lat, $lng, $preference);//obtenir les lieux différents autour du point central.
	//缺少的：把liste和tempsmoyenleslieux里的元素对接起来。
	$result = mysql_query("SELECT * FROM tempsmoyenleslieux WHERE lieuType = $preference");
	while($arr = mysql_fetch_assoc($result)){
		$arrs[] = $arr;
	}

	foreach($arrs as $arr){
		echo $arr['tempsSurPlace'];
		if($ida = 1){
			if($arr['tempsSurPlace']+60 <= $t_reste){
				$typeDeLieu = $arr['lieuType'];
				echo $typeDeLieu;
			}
		}elseif($ida = 2){
			if($arr['tempsSurPlace']+30 <= $t_reste){
				$typeDeLieu = $arr['lieuType'];
				echo $typeDeLieu;
			}
		}elseif($ida = 3){
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

//méthodes dans la classe sortie.
//prendre la prochaine activité.
/*function nextActivite($heure_tempsActuelle, $minute_tempsActuelle){
	//计算下一个activite。
	//tReste > 
	$h_tReste = "select heure_temps_reste from activite where idsr = idinv";
	$m_tReste = "select minute_temps_reste from activite where idsr = idinv";
	if($h_tReste - $heure_tempsActuelle >= 0){

	}
}*/

/*已经实现，在prochainElem里。缺少：界面一个触发prochainElem的开关。
//Changer l'activite。
//加到calcullist的choixSortie里去，在choixSortie里调用这个函数。
function ChangerActivite($activite){
	//if user does not like one of the activities proposed.
	
}*/

//

?>