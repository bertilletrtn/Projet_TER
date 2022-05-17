<?php
echo("test");


//session_start(); deja active
require_once("Connexion.php");
require_once("Conf.php");
$pdo = Connexion::getPDO();
//Conf::show_tables();

$titre = $pdo->quote($_POST['titre']);
$ville = $pdo->quote($_POST['ville']);
$lieu = $pdo->quote($_POST['lieu']);
$date = $pdo->quote($_POST['dateFiltre']);


if(!empty($_POST['product_check'])){
    foreach($_POST['product_check'] as $value){
        echo $value;
    }
}

$heure = $pdo->quote($_POST['appt-time']);



?>
