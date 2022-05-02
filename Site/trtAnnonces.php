<?php
session_start();
require_once("Connexion.php");
require_once("Conf.php");
$pdo = Connexion::getPDO();
Conf::show_tables();

var_dump($_SESSION);

$sql = "
    INSERT INTO annonces(ville, lieu, date, heuredebut, heurefin, theme, theme2, theme3, info_sup, titre, proprietaire) 
    VALUES (:ville, :lieu, :date, :hdebut, :hfin, :theme1, :theme2, :theme3, :infosup, :titre, :proprietaire)
    ";
$rqt = $pdo -> prepare($sql);
$tableau = [
    'ville' => $_POST['ville'],
    'lieu' => $_POST['lieu'],
    'date' => $_POST['date'],
    'hdebut' => $_POST['hdebut'],
    'hfin' => $_POST['hfin'],
    'theme1' => $_POST['theme1'],
    'theme2' => $_POST['theme2'] === "not" ? NULL : $_POST['theme2'],
    'theme3' => $_POST['theme3'] === "not" ? NULL : $_POST['theme3'],
    'infosup' => empty($_POST['infosup']) ? '' : $_POST['infosup'],
    'titre' => $_POST['titre'],
    'proprietaire' => $_SESSION['Num_Tel'],
];
echo "<pre>";
var_dump($tableau);
echo "</pre>";

$rqt -> execute($tableau);
header("Location:site.php");