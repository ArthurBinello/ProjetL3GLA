<?php
//bd_supplementaire permet selectionner des infos depuis le bd et afficher a l'ecran


//function qui permet "select" le detail d'activite	
function Detail($activite){
	global $cnx;
	$rqt="select nom, lieuActivite, heure_duree_estimee,minute_duree_estimee FROM activite WHERE nom='$activite'";
		$liste= $cnx->query($rqt);
		$liste->setFetchMode(PDO::FETCH_OBJ);
		$details = array(); 
		$index = 0;
		// Parcours des utilisateur
		while ($d= $liste->fetch()){
		
		$details[$index]["nom"] = $d->nom;
	    $details[$index]["lieuActivite"] = $d->lieuActivite;
		$details[$index]["heure_duree_estimee"] = $d->heure_duree_estimee;
		$details[$index]["minute_duree_estimee"] = $d->minute_duree_estimee;
	   
		$index++;
		}
		return $details;
	
}


//function qui affche un tableau et contient les infos d'activite dans un tableau
function afficherDetail($unDetail){
		
		echo "<div id=\"blocindex\">";
		echo "<table border='1'>";
		echo "<tr><th colspan=3>Table de Detail</th></tr><br>";
	    echo "<tr>";
				  echo "<th>Nom d'activite</th>";
				  echo "<th>Lieu d'activite</th>";
				  echo "<th>Duree esimee</th>";
				  echo "</tr>";	
			 foreach($unDetail as $valeur){
				  	
                  echo "<tr>";
                  echo "<td>".$valeur["nom"]."</td>"; 
				  echo "<td>".$valeur["lieuActivite"]."</td>";
				  echo "<td>".$valeur["heure_duree_estimee"]."&nbsp".$valeur["minute_duree_estimee"]."</td>";
                  echo "</tr>";			  
                  }
			  	
			
		
		echo "</table>";
		echo "</div>";
	}
	
//function qui permet "select" les 3 sorties depuis le tableau sortir
function getResultat(){
	  global $cnx;
	  $rqt="select activite1, activite2, activite3 FROM sortie WHERE ids = 1 ";
		$liste= $cnx->query($rqt);
		$liste->setFetchMode(PDO::FETCH_OBJ);
		$activites = array(); 
		$index = 0;
		// Parcours des utilisateur
		while ($d= $liste->fetch()){
		
		$activites[$index]["activite1"] = $d->activite1;
	    $activites[$index]["activite2"] = $d->activite2;
		$activites[$index]["activite3"] = $d->activite3;
	
	   
		$index++;
		}
		return $activites;
	  
}

//function qui permet affiche le resultat
function afficheResultat($unResultat){
     echo "<div id=\"blocindex\">";
	 
		echo "Voici le resultat <br>";
	    

			 foreach($unResultat as $valeur){
				  	
                  
                  echo "Activite 1: ".$valeur["activite1"]."&nbsp"; 
				  echo "<input id=\"change1\" type =\"submit\" value=\"Changez\" onclick=\"change1()\">";
				  echo "<br>";
				  echo "Activite 2: ".$valeur["activite2"]."&nbsp"; 
				  echo "<input id=\"change2\" type =\"submit\" value=\"Changez\" onclick=\"change2()\">";
				  echo "<br>";
				  echo "Activite 3: ".$valeur["activite3"]."&nbsp"; 
				  echo "<input id=\"change3\" type =\"submit\" value=\"Changez\" onclick=\"change3()\">";
				  echo "<br>";
                  	  
                  }
			  	
			
		
		
		echo "</div>";
}
	?>