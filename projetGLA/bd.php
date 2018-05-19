<?php
$dbms = 'mysql';
$user = 'root';
$pwd='';
$host = 'localhost';
$bdName = 'pgla';

$dsn="$dbms:host=$host;dbname=$dbName";
//Connexion à la base de données avec PDO
//$cnx=new PDO("mysql:host=localhost;dbname=pgla;charset=utf8","","");
$cnx=new PDO("$dsn,$user,$pwd");
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

function lieuxDeja($nomLieu, $genre){
		global $cnx;
		
		$query = $cnx->prepare('INSERT INTO lieuDeja(lieu, type) 
							   VALUES(:nomLieu, :genre )');
		$query->bindValue(':lieu',$nomLieu, PDO::PARAM_STR);
		$query->bindValue(':type',$genre, PDO::PARAM_STR);	
		$query->execute();
}


function siLieuDeja($le_nomLieu, $le_genre){
	$sql="select * from lieudeja where nomLieu=$le_nomLieu and genre='$le_genre'";  
	$result=mysql_query($sql);  
	  
	$row = mysql_fetch_array($result, MYSQL_ASSOC);  
	  
	    if (!mysql_num_rows($result))  
	        {  
	            return true; 
	        }  
	    else  
	        {  
				return false; 
	        }  

}

/*function silieudeja($nomlieu, $genre){
	global $cnx;

	$lieux = array();
	$index=0;
	while($unlieu=$listelieu->fetch(PDO::FETCH_OBJ))
	{
		$lieux[$index]["nomlieu"]=$unlieu->nomlieu;
		$lieux[$index]["genre"]=$unlieu->genre;
		$index++;
	}
	//on ferme le curseur
	$listelieu->CloseCursor();

}*/

?>