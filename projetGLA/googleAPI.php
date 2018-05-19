<?php

function nearbysearch($lat, $lng, $type){
	$key = "AIzaSyA2PDrfTTbXNZKOn15K-VbWgLfdTevM3qw";
	$url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat.",".$lng."&radius=500&type=".$type."&key=" . $key;
	$json = file_get_contents($url);
	return $json;
}

function decode_json_to_array($data) {
	$stack = array();
	$results = json_decode($data, true);
	$status = $results['status'];
	if ($status == "OK") {
		foreach($results['results'] as $key => $value) {
			$var = array($value['id'], $value['geometry']['location']['lat'], $value['geometry']['location']['lng'], $value['name'], $value['vicinity'], $value['rating'], $value['place_id']);
			array_push($stack, $var);
		}
	}
	else{
		echo "ERREUR DE GOOGLE PLACES API";
	}
	return $stack;
}

function getCoordinates($address){
	$key = "AIzaSyA2PDrfTTbXNZKOn15K-VbWgLfdTevM3qw";
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false&key=".$key;
	$json = file_get_contents($url);
	$results = json_decode($json, true);

	$stack = array();
	$status = $results['status'];
	if ($status == "OK") {
        $lat = $results['results']['0']['geometry']['location']['lat'];
        array_push($stack, $lat);
        $lng = $results['results']['0']['geometry']['location']['lng'];
        array_push($stack, $lng);
	}
	else{
		echo "ERREUR DE GOOGLE GEOCODE API";
	}
	
	return $stack;
}

?>
