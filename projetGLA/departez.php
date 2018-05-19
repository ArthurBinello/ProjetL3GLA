<?php
session_start();
include 'bd.php';
include 'index.php';

$nom=$_POST["nom_0"];
$adr=$_POST["adr_0"];
$transport=$_POST["transport"];
$date=$_POST["date"];
$heure=$_POST["heure"];
$minute=$_POST["minute"];
$duree=$_POST["duree"];
$preference=$_POST["preference"];

sortir($nom,$adr,$transport,$date,$heure,$minute,$duree, $preference);

?>