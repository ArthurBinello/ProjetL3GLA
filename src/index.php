<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Sortie à Paris</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="/resources/demos/style.css">
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script>
     $( function() {
       $( "#datepicker" ).datepicker();
     } );
     </script>
</head>

<body id="back">
    <div id="global">
		<p><img src="images/logo.jpg" alt="logo de quizz" class="logo"></P>
		<h1 class="titre">Sortie à Paris</h1><br/><br>
		<fieldset>
			<legend>Sortie à Paris? Départez maintenant!</legend>
				<form action="departez.php" method="post">
						<label>Votre nom:</label>
							<div id="d">
                            <input type="text" name="nom_0" value="nom_0"> 
					       
                            </div>
                            <input type="button" id="b" value="ajouter invité" class="btn"/><br/><br/>
						<label>Votre adresse:</label>
						    <div id="a">
							<input type="text" name="adr_0" value="adresse_0"><br/><br/>
							</div>
						<label>Transport choisi:</label>
						<select name="transport">
                            <option value="voiture">Voiture</option>
                            <option value="metro">Metro</option>
                            <option value="velo">Velo</option>
                            <option value="pied">Pied</option>
                        </select><br/><br/>
						<label>Date:</label>
						<input type="text" id="datepicker" name="date"></br></br>
						
						<label>Heure de départ:</label> 
						
                        <select name="heure">
                            <option value="one">1</option>
                            <option value="two">2</option>
                            <option value="three">3</option>
                            <option value="four">4</option>
							<option value="five">5</option>
                            <option value="six">6</option>
                            <option value="seven">7</option>
							<option value="eight">8</option>
                            <option value="nine">9</option>
							<option value="ten">10</option>
                            <option value="eleven">11</option>
                            <option value="twelve">12</option>
                            <option value="thirteen">13</option>
							<option value="fourteen">14</option>
                            <option value="fifteen">15</option>
                            <option value="sixteen">16</option>
                            <option value="seventeen">17</option>
							<option value="eighteen">18</option>
                            <option value="nighteen">19</option>
                            <option value="twenty">20</option>
                            <option value="twentyone">21</option>
							<option value="tweentytwo">22</option>
							<option value="tweentythree">23</option>
                            <option value="tweentyfour">24</option>
                        </select>
						<select name="minute">
                            <option value="zz">00</option>
                            <option value="zc">05</option>
                            <option value="dix">10</option>
                            <option value="quinze">15</option>
							<option value="vingt">20</option>
                            <option value="vc">25</option>
                            <option value="trente">30</option>
							<option value="tc">35</option>
                            <option value="qurante">40</option>
							<option value="qc">45</option>
                            <option value="cinquante">50</option>
                            <option value="cc">55</option>     
                        </select>
                        </br></br>
                       

						
						<label>Durée estimez:</label>
						<select name="duree">
                            <option value="one">1</option>
                            <option value="two">2</option>
                            <option value="three">3</option>
                            <option value="four">4</option>
							<option value="five">5</option>
                            <option value="six">6</option>
                            <option value="seven">7</option>
							<option value="eight">8</option>
                            <option value="nine">9</option>
							<option value="ten">10</option>
                            <option value="eleven">11</option>
                            <option value="twelve">12</option>
                        </select>
						</br></br>
						
						<label>Préference alimentaire:</label>
						<select name ="preference">
						    <option value="aucun">Aucun</option>
                            <option value="chinois">Chinois</option>
                            <option value="mcdonald">McDonald</option>
			 				<option value="kfc">KFC</option>
                            <option value="francais">Francais</option>
                            <option value="cafe">Cafe</option>
							<option value="italien">Italien</option>
                            <option value="japonais">Japonais</option>
							<option value="piscine">Piscine</option>
                            <option value="bar">Bar</option>
							<option value="cinema">Cinema</option>
							<option value="club">Club</option>
							<option value="opera">Opera</option>
                        </select>
					    <br/><br/>
						
						
						<p><input type="submit" value="Départez" class="btn"></p>
						
				</form>
				       
		</fieldset>	


</body>




<script language="javascript">

var i = 1;
document.getElementById("b").onclick=function(){
  document.getElementById("d").innerHTML+='<div id="div_'+i+'"><input type="text" name="nom_'+i+'"  value="nom_'+i+'"  />&nbsp<input type="button" value="Supprimer"  onclick="del('+i+')" class="btn"/></div>';
  document.getElementById("a").innerHTML+='<div id="div_'+i+'"><input type="text" name="adr_'+i+'"  value="adresse_'+i+'"  /></div>';
  i = i + 1;

}

function del(o){
 document.getElementById("d").removeChild(document.getElementById("div_"+o));
 document.getElementById("a").removeChild(document.getElementById("div_"+o));
 
}
</script>

</html>