<?php
require("../layouts/header.html");

require_once("../Site/connexpdo.inc.php");

$pdo = connexpdo("Projet");

session_start();


if ($_SESSION['Num_Tel'] !== "") {
    $utilisateur = $_SESSION['Num_Tel'];
}

$sql = "SELECT * FROM utilisateurs WHERE Num_Tel=$utilisateur";

$reponse = $pdo->query($sql);

$tableau = $reponse->fetchAll(PDO::FETCH_OBJ);

foreach ($tableau as $item) :

    $prenom = $item->Prenom;
    $nom = $item->Nom;
    $pseudo = $item->Pseudo;
    $age = $item->Age;
    $num_tel = $item->Num_Tel;
    $ville = $item->Ville;
    $mdp = $item->Mdp;
?>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../layouts/header.css">
        <link rel="stylesheet" href="../layouts/footer.css">
        <link rel="stylesheet" href="../mesInfos/infoPerso.css">
    </head>

    <body>
        <form action='trtinfoperso.php' method="post" enctype="application/x-www-form-urlencoded">


            <div style="flex:center" class='elementmesinfos'>
                <h1>Mes informations :</h1>
                    <p>Nom : <?= $nom ?> </p>
                    <p>Prénom : <?= $prenom ?></p>
                    <p>Pseudo : <?= $pseudo ?></p> 
                    <p>Age : <?= $age ?> </p>
                    <p>Numéro de téléphone : 0<?= $num_tel ?></p>
                    <p>Ville : <?= $ville ?> </p>
            </div>

            <!-- <div style="flex:center" class='modifieinfo'> -->
            <input type="submit" name="modifinfo" value="Modifier mes informations">
            <!-- </div> -->
            </from>

    </body>

    </html>



<?php endforeach ?>