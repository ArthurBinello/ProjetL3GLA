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
        foreach($results['results'] as $key => $value)
		{
			$var = array($value['id'], $value['geometry']['location']['lat'], $value['geometry']['location']['lng'], $value['name'], $value['vicinity'], $value['rating'], $value['place_id']);
			array_push($stack, $var);
		}
    }
    else{
    	echo "ERREUR DE GOOGLE PLACES API";
    }
    return $stack;
}

?>
