# ProjetL3GLA : Sortie à Paris

Ce projet a été réalisé dans le cadre de l'option Projet GLA (Génie logiciel avancé) de 3e année de licence de l'université Paris-Sud sous le tutorat de M. Nguyen Van Hai et de M. Wolff Burkhart.

## Synopsis

Ce projet permet de réaliser des sorties groupées gerées par un organisateur. Différents types de lieux sont proposées comme des restaurants, des clubs ou encore des cafés. Un lieu de rencontre central est calculé et les différents lieux sont choisis en fonction. Le système calcule de même le temps de transport pour que la sortie se poursuit sans temps mort en prenant compte du temps passé à effectuer chacune des activités choisies. Une sortie est un groupe de 3 activités se suivant. Une analyse UML a été effectuée en amont pour définir le projet.

## API utilisées

* [Google Places](https://cloud.google.com/maps-platform/places/) - Descriptin et recherche de lieux
* [Google Geocoding](https://developers.google.com/maps/documentation/geocoding/intro) - Recherche et calcul d'adresse

## Execution/Compilation

### Création de la base de données :
[http://localhost/phpmyadmin/](http://localhost/phpmyadmin/) > New > Import > Choose File > pgla.sql > Go

### Utilisation de l'application :
[http://localhost/src/](http://localhost/src/) ou [http://localhost/src/index.php](http://localhost/src/index.php)
Puis suivre les indications de l'application et sa logique.

## Contributeurs

* Mme Mo Rui
* M. Binello Arthur
* M. Gan Boyuan
