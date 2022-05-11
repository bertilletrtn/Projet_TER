<?php

session_start();

require_once("../Site/connexpdo.inc.php");

$pdo = connexpdo("Projet");

if ($_SESSION['Num_Tel'] !== "") {
    $participant = $_SESSION['Num_Tel'];
    echo("bonjour $participant");
}

$url = $_SERVER['REQUEST_URI'];
$theid = substr($url, strrpos($url, "?"), strlen($url));

$primary = explode("?", $theid);
$cle = $primary[1];

echo("Annonce : $cle");
$requete = "DELETE FROM participation WHERE Participant='$participant' AND Annonce='$cle'";
$reponse = $pdo->query($requete);

header("Refresh:0.5; url=Compte.php");
alert("Vous avez été désinscrit à cette activité !");

?>