<?php

include 'googleAPI.php';

//Calcule le centre géographique d'un tableau d'adresses
function centreGeo($adresses){
	$coords = array();
	$i=0;
	foreach ($adresses as $adress) {
		$coord = getCoordinates($adress);
		array_push($coords, $coord);
		$i++;
	}
	$centre = array();
	$lat=0;
	$lng=0;
	foreach ($coords as $place) {
		$lat += $place[0];
		$lng += $place[1];
	}
	$lat /= $i;
	$lng /= $i;
	array_push($centre, $lat);
	array_push($centre, $lng);

	return $centre;
}

//Calcule la distance entre 2 coordonnées
function calculDistance($lat1, $lng1, $lat2, $lng2){
	$earthRadius = 6371000;
	$latFrom = deg2rad($lat1);
	$lngFrom = deg2rad($lng1);
	$latTo = deg2rad($lat2);
	$lngTo = deg2rad($lng2);

	$latDelta = $latTo - $latFrom;
	$lngDelta = $lngTo - $lngFrom;

	$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lngDelta / 2), 2)));
	echo $angle * $earthRadius;
	return $angle * $earthRadius;
}

//Calcule la durée du trajet en fonction du transport (arrondie en vol d'oiseau)
function dureeTrajet($transport, $distance){
	$speed = 1.0;
	if(strcmp($transport, "voiture") == 0){
		$speed = 20;
	}
	else if(strcmp($transport, "metro") == 0){
		$speed = 12.5;
	}
	else if(strcmp($transport, "velo") == 0){
		$speed = 4.2;
	}
	else{ //a pied
		$speed = 1.4;
	}
	$duree = $distance / $speed;
	$duree /= 60;
	$duree = ceil($duree / 5) * 5;

	return duree;
}

?>
