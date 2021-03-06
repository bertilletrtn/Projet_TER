<?php
include("../layouts/header.html");
session_start();
?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layouts/header.css">
    <link rel="stylesheet" href="../Compte/compte.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>

    <title>Annonces</title>
</head>

<body>

    <main>
        <div id="menu">
            <div id="menu-list">
                <a href="#annonces">Mes annonces </a>
                <a href="#particicpantannonce">Participants de mes annonces </a>
                <a href="#participation">Mes participations </a>

            </div>

            <div id="annonces">
                <h3>Mes annonces : </h3>

                <?php

                try {
                    require_once("../Site/connexpdo.inc.php");

                    $pdo = connexpdo("Projet");

                    if ($_SESSION['Num_Tel'] !== "") {
                        $proprietaire = $_SESSION['Num_Tel'];
                    }

                    $sql = "SELECT *, a.ville AS villeannonce FROM annonces a JOIN utilisateurs u ON a.proprietaire = u.num_tel WHERE u.num_tel='$proprietaire' ORDER BY date DESC";
                    $reponse = $pdo->query($sql);

                    $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);


                    foreach ($tableau as $item) {

                        $arr_heure_debut = explode(":", $item->HeureDebut);
                        $heure_debut = $arr_heure_debut[0] . ":" . $arr_heure_debut[1];

                        $theme = $item->theme;

                        $Pseudo = $item->Pseudo;
                        if ($item->Pseudo === "") {
                            $Pseudo = $item->Prenom;
                        }


                        echo "<div class='elementParticipation'>
                    <div id='gauche2'>
                    <h1>{$item->Titre}</h1>
                    
                    <p2>{$item->villeannonce} {$item->Lieu}</p2>
                    <p3>Le {$item->Date} ?? {$heure_debut}</p3>
                    <h5>{$item->Info_sup}</h5>
                    </div>
            

                    <div id='droite2'>
                       
                        <img src='../../Ressource/$item->theme.webp' id='image' alt='theme' width='250px' height='auto' />
                        <div id='bouton'>
                        <div id='boutonp'>
                            <a href='../Site/siteannonce.php?$item->id' > commentaire </a>
                            </div>
                            </div>
                    </div>
        </div>";
                    }
                } catch (PDOException $e) {
                    echo 'Impossible de traiter les donn??es. Erreur : ' . $e->getMessage();
                }
                ?>
            </div>
                <div id="particicpantannonce">
                    <h3>Les participations ?? mes annonces : </h3>
                <?php

                try {

                    $sql = "SELECT * FROM participation p JOIN utilisateurs u ON u.num_tel = p.Participant JOIN annonces a ON a.id = p.Annonce WHERE p.Participant='$proprietaire'";
                    $reponse = $pdo->query($sql);

                    $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);


                    $sql = "SELECT p.Participant FROM participation p JOIN annonces a ON a.id = p.Annonce JOIN utilisateurs u ON u.num_tel = a.Proprietaire WHERE a.Proprietaire='$proprietaire'";


                    $reponse = $pdo->query($sql);


                    $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);


                    $liste_id = array();

                    $result = $pdo->query("SELECT id FROM annonces WHERE Proprietaire='$proprietaire'");
                    while (list($id) = $result->fetch(PDO::FETCH_NUM)) {
                        // echo "id: $id \n";


                        array_push($liste_id, $id);
                    }


                    $taille_liste = (count($liste_id));

                    $i = 0;

                    while ($i < $taille_liste) {

                        $Titre;
                        $resultbis = $pdo->query("SELECT Titre FROM annonces WHERE id=$liste_id[$i]");
                        while (list($titre) = $resultbis->fetch(PDO::FETCH_NUM)) {
                            // echo "titre: $titre \n";
                            $Titre = $titre;
                        
                        }

                        $liste_participant = array();
                        ?>
                        <div class="tableau">

                        <?php

                        echo"
                        <h4> Annonce : $Titre </h4>
                        ";

                        $requette =  $pdo->query("SELECT u.Prenom FROM participation p JOIN annonces a ON a.id = p.Annonce JOIN utilisateurs u ON p.Participant = u.Num_Tel WHERE a.Proprietaire='$proprietaire' and p.Annonce='$liste_id[$i]'");

                        while (list($participant) = $requette->fetch(PDO::FETCH_NUM)) {

                        echo "
                        <p>$participant</p>
                        ";
                        }

                        ?>
                        </div>
                        <?php

                        $i = $i + 1;
                    }
                } catch (PDOException $e) {
                    echo 'Impossible de traiter les donn??es. Erreur : ' . $e->getMessage();
                }

                ?>

            </div>


        <div id="participation">
            <h3>Mes participations : </h3>

            <?php

            try {

                $sql = "SELECT *, a.ville AS villeannonce  FROM participation p JOIN utilisateurs u ON u.num_tel = p.Participant JOIN annonces a ON a.id = p.Annonce WHERE p.Participant='$proprietaire'";
                $reponse = $pdo->query($sql);


                $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);


                foreach ($tableau as $item) {

                    $Pseudo = $item->Pseudo;
                    if ($item->Pseudo === "") {
                        $Pseudo = $item->Prenom;
                    }


                    $_SESSION['id'] = $id;


                    echo "<div class='elementParticipation'>
                    <div id='gauche2'>
                    <h1>{$Pseudo} participe </h1>
                    <h2>{$item->Titre}</h2>
                    
                    <p2>{$item->villeannonce} {$item->Lieu}</p2>
                    <p3>Le {$item->Date} ?? {$heure_debut}</p3>
                    <h5>{$item->Info_sup}</h5>
                    </div>

                    <div id='droite2'>
                    <img src='../../Ressource/$item->theme.webp' alt='theme' width='250px' height='auto' />
                    <div id='bouton'>
                        <div id='boutonp'>
                            <a href='trtCompte.php?$item->id' > annuler participation </a>
                            <a href='../Site/siteannonce.php?$item->id' > commentaire </a>
                        </div id='boutonp'>
                        </div>
                    </div>
        </div>";
                }
            } catch (PDOException $e) {
                echo 'Impossible de traiter les donn??es. Erreur : ' . $e->getMessage();
            }

            ?>
        </div>
        <a href="#top" id="scrollUp"><img src="../../Ressource/to_top.png" /></a>


        </div>
        <!-- A CORRIGER -->
        <!-- <?php require "../layouts/footer.html"; ?> -->
    </main>
</body>

</html>