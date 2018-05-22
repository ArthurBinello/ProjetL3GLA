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

//insert to sortir(c'est l'invite).
function sortir($l_idsr, $nom,$adr, $transport, $date, $heure, $minute, $duree, $preference){
		global $cnx;
		//Hachage du mot de passe 
		
		$query = $cnx->prepare('INSERT INTO sortir(idsr,nom,adresse,transport,date,heure,minute,duree, preference) 
							   VALUES(:l_idsr, :nom, :adresse, :transport, :date, :heure, :minute, :duree, :preference )');
		$query->bindValue(':idsr',$l_idsr, PDO::PARAM_STR);
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
//insert to sortie.(n'est pas sortir comme cela en dessus.)
function sortie($l_ids, $activite1, $sctivite2, $activite3){
		global $cnx;
		
		$query = $cnx->prepare('INSERT INTO sortie(ids,activite1, activite2, activite3) 
							   VALUES(:l_ids, :activite1, :activite2, :activite3)');
		$query->bindValue(':ids',$l_ids, PDO::PARAM_STR);
		$query->bindValue(':activite1',$activite1, PDO::PARAM_STR);
		$query->bindValue(':activite2',$activite2, PDO::PARAM_STR);
		$query->bindValue(':activite3',$activite3, PDO::PARAM_STR);
		$query->execute();
}

//insert to adresse.
function adresse($l_idadr, $adr){
		global $cnx;

		$query = $cnx->prepare('INSERT INTO adresse(idadr, adresse)VALUES(:l_idadr, :adr)');
		$query->bindValue(':l_idadr',$adr, PDO::PARAM_STR);
		$query->bindValue(':adresse',$adr, PDO::PARAM_STR);
		$query->execute();
	}

//insert to transport.
function transport($l_idtr,$modTransport, $h_tsMax, $m_tsMax){
		global $cnx;

		$query = $cnx->prepare('INSERT INTO transport(idtr,mode_Transport,heure_tempSomeMax, minute_tempSomeMax)VALUES(:l_idtr, :modTransport, :h_tsMax, :m_tsMax)');
		$query->bindValue(':idtr',$l_idtr, PDO::PARAM_STR);
		$query->bindValue(':mode_Transport',$modTransport, PDO::PARAM_STR);
		$query->bindValue(':heure_tempSomeMax',$h_tsMax, PDO::PARAM_STR);
		$query->bindValue(':minute_tempSomeMax',$m_tsMax, PDO::PARAM_STR);
		$query->execute();
	}

//insert to temps.
function temps($l_idt, $heure, $minute){
		global $cnx;

		$query = $cnx->prepare('INSERT INTO temps(idt,heure,minute)VALUES(:l_idt, :heure, :minute)');
		$query->bindValue(':idt',$l_idtr, PDO::PARAM_STR);
		$query->bindValue(':heure',$heure, PDO::PARAM_STR);
		$query->bindValue(':minute',$minute, PDO::PARAM_STR);
		$query->execute();
}

//insert to preference.
function preference($l_idp, $nomPreference){
		global $cnx;

		$query = $cnx->prepare('INSERT INTO preference(idp,nomPreference)VALUES(:l_idp, :nomPreference)');
		$query->bindValue(':idp',$l_idp, PDO::PARAM_STR);
		$query->bindValue(':nomPreference',$nomPreference, PDO::PARAM_STR);	
		$query->execute();
}

//insert to activite.
function activite($l_ida, $nom, $lieuActivite, $heure_duree_estimee, $minute_duree_estimee, $heure_temps_transport, $minute_temps_transport, $heure_temps_reste, $minute_temps_reste){
		global $cnx;

		$query = $cnx->prepare('INSERT INTO activite(ida, nom, lieuActivite, heure_duree_estimee, minute_duree_estimee, heure_temps_transport, minute_temps_transport, heure_temps_reste, minute_temps_reste)VALUES(:l_ida, :nom, :lieuActivite, :heure_duree_estimee, :minute_duree_estimee, :heure_temps_transport, :minute_temps_transport, :heure_temps_reste, :minute_temps_reste)');
		$query->bindValue(':idp',$l_idp, PDO::PARAM_STR);
		$query->bindValue(':nom',$nom, PDO::PARAM_STR);
		$query->bindValue(':lieuActivite',$lieuActivite, PDO::PARAM_STR);
		$query->bindValue(':heure_duree_estimee',$heure_duree_estimee PDO::PARAM_STR);
		$query->bindValue(':minute_duree_estimee',$minute_duree_estimee, PDO::PARAM_STR);
		$query->bindValue(':heure_temps_transport',$heure_temps_transport, PDO::PARAM_STR);
		$query->bindValue(':minute_temps_transport',$minute_temps_transport, PDO::PARAM_STR);
		$query->bindValue(':heure_temps_reste',$, PDO::PARAM_STR);
		$query->bindValue(':minute_temps_reste',$minute_temps_reste, PDO::PARAM_STR);	
		$query->execute();
}

//insert to lieu.
function lieu($l_idl, $genre, $nomLieu, $heure_heureOuverture, $minute_heureOuverture, $heure_heureFermeture, $minute_heureFermeture){
		global $cnx;

		$query = $cnx->prepare('INSERT INTO lieu(idl, genre, nomLieu, heure_heureOuverture, minute_heureOuverture, heure_heureFermeture, minute_heureFermeture )VALUES(:l_idl, :genre, :nomLieu, :heure_heureOuverture, :minute_heureOuverture, :heure_heureFermeture, :minute_heureFermeture)');
		$query->bindValue(':idl',$l_idl, PDO::PARAM_STR);
		$query->bindValue(':genre',$genre, PDO::PARAM_STR);
		$query->bindValue(':nomLieu',$nomLieu, PDO::PARAM_STR);
		$query->bindValue(':heure_heureOuverture',$heure_heureOuverture, PDO::PARAM_STR);
		$query->bindValue(':minute_heureOuverture',$minute_heureOuverture, PDO::PARAM_STR);
		$query->bindValue(':heure_heureFermeture',$heure_heureFermeture, PDO::PARAM_STR);
		$query->bindValue(':minute_heureFermeture',$minute_heureFermeture, PDO::PARAM_STR);
		$query->execute();
}

//insert to lieuDeja. lieuDeja est pour stocker les lieux affichés mais l'usager n'aime pas.
function lieuxDeja($l_idldeja, $nomLieu, $genre){
		global $cnx;
		
		$query = $cnx->prepare('INSERT INTO lieuDeja(idldeja, nomlieu, genre) 
							   VALUES(:l_idldeja,:nomLieu, :genre )');
		$query->bindValue(':idldeja',$l_idldeja, PDO::PARAM_STR);
		$query->bindValue(':nomLieu',$nomLieu, PDO::PARAM_STR);
		$query->bindValue(':genre',$genre, PDO::PARAM_STR);	
		$query->execute();
}

//Verifier si le lieu est dans leiuDeja.
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
