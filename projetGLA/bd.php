<?php
//Connexion à la base de données avec PDO
$cnx=new PDO("mysql:host=localhost;dbname=gla;charset=utf8","mo","mo");
function sortir($nom,$adr, $transport, $date, $heure, $minute, $duree, $preference){
		global $cnx;
		//Hachage du mot de passe 
		
		$query = $cnx->prepare('INSERT INTO sortir(nom,adresse,transport,date,heure,minute,duree, preference) 
							   VALUES(:nom, :adresse, :transport, :date, :heure, :minute, :duree, :preference )');
		$query->bindValue(':nom',$nom, PDO::PARAM_STR);
		$query->bindValue(':adresse',$adr, PDO::PARAM_STR);
		$query->bindValue(':transport',$transport, PDO::PARAM_STR);
		$query->bindValue(':date',$date, PDO::PARAM_STR);
		$query->bindValue(':heure',$heure, PDO::PARAM_STR);
		$query->bindValue(':minute', $minute, PDO::PARAM_STR);
		$query->bindValue(':duree',$duree, PDO::PARAM_STR);
		$query->bindValue(':preference', $preference, PDO::PARAM_STR);
		$query->execute();
	}
	?>