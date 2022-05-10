<?php
//session_start(); deja active
require_once("Connexion.php");
require_once("Conf.php");
$pdo = Connexion::getPDO();
//Conf::show_tables();



if (isset($_GET['titreFiltre']) AND isset($_GET['villeFiltre']) AND isset($_GET['lieuFiltre']) AND isset($_GET['dateFiltre']) AND isset($_GET['time']) )
{

    $titre = htmlspecialchars($_GET['titreFiltre']);
    $ville = htmlspecialchars($_GET['villeFiltre']);
    $lieu = htmlspecialchars($_GET['lieuFiltre']);
    $date = htmlspecialchars($_GET['dateFiltre']);
    $time = htmlspecialchars($_GET['time']);

    $reponse = $bdd->query ('select *
         from annonces
         where titreFiltre like "%'.$titre.'%"  and villeFiltre like "%'.$ville.'%" and lieuFiltre like "%'.$lieu.'%" and dateFiltre like "%'.$date );

$rqt -> execute($reponse);
}

?>
