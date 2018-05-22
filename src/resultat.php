<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style1.css" />
 	<title>Sortie à Paris</title>
	<body>
	<h3>Voici le resultat:</h3>
<?php
			session_start();
		
			include "bd.php";
			
			   
			
			
           
				afficheResultat(getResultat());
				echo "<br>";
				
				
			    
           
			
			

        ?> 
	
	
	</body>
</html>