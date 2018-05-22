<?php

include 'googleAPI.php';

//retourne le prochain élément dans la liste
function prochainElem($liste, $index){
	$max = 20;
	if($i+1 >= $max){
		return $liste[0];
	}
	else{
		$i++;
		return $liste[$i];
	}
}

//retourne un groupe de 3 sorties de type différent
function choixSorties($lat, $lng, $sortie1, $sortie2, $sortie3){
	$sorties = array();
	$event1 = decode_json_to_array(nearbysearch($lat, $lng, $sortie1));
	array_push($sorties, $event1);
	$event2 = decode_json_to_array(nearbysearch($lat, $lng, $sortie2));
	array_push($sorties, $event2);
	$event3 = decode_json_to_array(nearbysearch($lat, $lng, $sortie3));
	array_push($sorties, $event3);

	return $sorties;
}

//retourne la liste de tous les restaurants à proximité en fonction de la préférence alimentaire
function preferenceAlim($lat, $lng, $preference){
	$resto = "restaurant";
	if(strcmp($preference, "Aucune") !== 0){
		$resto = $resto." ".$preference;
	}
	$restaurants = decode_json_to_array(nearbysearch($lat, $lng, $resto));

	return $restaurants;
}

?>
