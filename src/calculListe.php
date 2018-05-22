<?php

include 'googleAPI.php';

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

function listeRestaurant($lat, $lng, $preferences){
		
}

?>
