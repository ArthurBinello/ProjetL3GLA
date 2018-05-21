<?php

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

?>