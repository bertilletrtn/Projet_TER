<?php
include("../../BDD/connexionpdo.php");
$idcom = connexpdo("Projet");
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tel']) && !empty($_POST['age']) && !empty($_POST['mdp'])) {
    try {
        $nom = $idcom->quote($_POST['nom']);
        $prenom = $idcom->quote($_POST['prenom']);
        $tel = $idcom->quote($_POST['tel']);
        $age = $idcom->quote($_POST['age']);
        $mdp = $idcom->quote($_POST['mdp']);
        $mdpconfirm = $idcom->quote($_POST['mdpconfirm']);
        $pseudo = $idcom->quote($_POST['pseudo']);
        $ville = $idcom->quote($_POST['ville']);

        if ($mdp != $mdpconfirm) {
            alert("Erreur : Le mot de passe ne correspond pas ! ");
            return;
        }

        // if($age <= 0 or $age >= 100){
        //     alert("Erreur : Votre âge n'est pas valide ! ");
        //     return;
        // }

        $query = "INSERT INTO utilisateurs VALUES($prenom,$nom,$pseudo,$age,$tel,$ville,$mdp)";
        $nb = $idcom->exec($query);
        if ($nb != 1) {
            alert("Erreur : \"$idcom->errorCode()\"");

            header("Refresh:0.5; url=../Inscription/inscription.php");
            alert("Le formulaire a mal été remplie ! Reccomnencez");
        } else {
            // alert("Modèle bien enregistré !");
            header('Location: ../Connexion/connexion.php');
            exit();
        }
    } catch (PDOException $e) {
        header("Refresh:0.5; url=../Inscription/inscription.php");
        alert("Le formulaire a mal été remplie ! Reccomnencez");
    }
}
