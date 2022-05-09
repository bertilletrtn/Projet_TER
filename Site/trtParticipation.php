<?php
session_start();

 require_once("connexpdo.inc.php");

 $pdo = connexpdo("Projet");

if ($_SESSION['Num_Tel'] !== "") {
    $participant = $_SESSION['Num_Tel'];
    // afficher un message
    echo "Bonjour $participant, vous êtes connecté";
    
}


if (isset($_POST['bouton-participer'])) {
    $id_annonce = "1";
    $query = "INSERT INTO participation VALUES($participant,$id_annonce)";
    $nb = $pdo->exec($query);
    
    if ($nb != 1) {
        alert("Erreur : \"$pdo->errorCode()\"");
    } else {
        alert("Modèle bien enregistré !");
        header('Location: site.php');
        exit();
    }
}else{
    echo(" on entre pas dans le if");
}
