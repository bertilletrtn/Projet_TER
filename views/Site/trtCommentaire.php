<?php
session_start();

require_once("connexpdo.inc.php");

$pdo = connexpdo("Projet");

if ($_SESSION['Num_Tel'] !== "") {
    $connecter = $_SESSION['Num_Tel'];
}

echo "$connecter";

$url = $_SERVER['REQUEST_URI'];
$theid = substr($url, strrpos($url, "?"), strlen($url));

$primary = explode("?", $theid);
$cle = $primary[1];

echo " $cle ";

if (!empty($_POST['commentaire'])) {
    try {

        $commentaire = $pdo->quote($_POST['commentaire']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO commentaires (num_annonce, id_utilisateur, commentaire, date) 
        VALUES (:num_annonce, :id_utilisateur, :commentaire, :date) ";
        $rqt = $pdo->prepare($sql);
        $tableau = [
            'num_annonce' => $cle,
            'id_utilisateur' => $connecter,
            'commentaire' => $commentaire,
            'date' => $date,
        ];

        $rqt->execute($tableau);
        header("Refresh:0.5; url=siteannonce.php?$cle");
        alert("votre commentaire est poster ! Merci");



    } catch (PDOException $e) {
        displayException($e);
        exit();
    }
}else{
    header("Refresh:0.5; url=siteannonce.php?$cle");
    alert("votre commentaire ne s'est pas poster !");
}

