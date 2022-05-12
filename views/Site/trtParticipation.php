<?php
session_start();

require_once("connexpdo.inc.php");

$pdo = connexpdo("Projet");

if ($_SESSION['Num_Tel'] !== "") {
    $participant = $_SESSION['Num_Tel'];
}

$tab_participant = array();
array_push($tab_participant, $participant);

$url = $_SERVER['REQUEST_URI'];
$theid = substr($url, strrpos($url, "?"), strlen($url));

$primary = explode("?", $theid);
$cle = $primary[1];

$requete = "SELECT * FROM participation WHERE Participant='$participant' AND Annonce='$cle'";
$reponse = $pdo->query($requete);

$ligne = $reponse->fetchAll(PDO::FETCH_OBJ);

if ($ligne == array()) {

    $requete2 = "SELECT Proprietaire FROM annonces WHERE id='$cle' ";
    $reponse2 = $pdo->query($requete2);

    $ligne2 = $reponse2->fetchAll(PDO::FETCH_NUM);

    if ($ligne2[0] == $tab_participant) {
        header("Refresh:0.5; url=site.php");
        alert("Vous ne pouvez pas vous inscrire à votre propre annonce");
    } else {
        $sql = "INSERT INTO participation (Participant, Annonce) 
                VALUES (:participant, :annonce) ";
        $rqt = $pdo->prepare($sql);
        $tableau = [
            'participant' => $participant,
            'annonce' => $cle,
        ];

        $rqt->execute($tableau);
        header("Refresh:0.5; url=site.php");
        alert("votre inscription à bien été prise en compte ! Merci");
    }
} else {
    header("Refresh:0.5; url=site.php");
    alert("Vous êtes déjà inscrit pour participer à cette activité ! ");
}
