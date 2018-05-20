<?php

include 'googleAPI.php';

//Calcul le centre géographique d'un tableau d'adresses
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

?>