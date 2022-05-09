<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compte.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="../footer.css">

    <title>Compte</title>
</head>

<body>

    <?php
    include("../header.php");
    ?>
    <main>

        <div id="menu">
            <div id="menu-list">
                <a href="#annonces">Mes annonces</a>
                <a href="#participation">Mes participations</a>

            </div>

            <div id="annonces">
                <div id="annonces-gauche">
                <h3>Mes annonces : </h3>

                <?php

                session_start();


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
                        /*
                    echo "<pre>";
                    var_dump($item);
                    echo "</pre>";
                    */

                        $arr_heure_debut = explode(":", $item->HeureDebut);
                        $heure_debut = $arr_heure_debut[0] . ":" . $arr_heure_debut[1];

                        $theme = $item->theme;

                        $Pseudo = $item->Pseudo;
                        if ($item->Pseudo === "") {
                            $Pseudo = $item->Prenom;
                        }

                        echo "<div class='elementannonce'>
                    <div id='gauche'>
                            <h1>{$item->Titre}</h1>
                            <p1>{$Pseudo} propose </p1>
                            <p2>{$item->villeannonce} {$item->Lieu}</p2>
                            <p3>Le {$item->Date} à {$heure_debut}</p3>
                            <h5>{$item->Info_sup}</h5>
                    </div>
            

                    <div id='droite'>
                        <img src='../Ressource/$theme.webp' alt='$theme' width='250px' height='auto' />
                        <div id='bouton'>
                            <input type='button' name='bouton-participer' value='participations' />
                            <input type='button' name='bouton-commenter' value='commentaires' />
                        </div>
                    </div>
        </div>";
                    }
                } catch (PDOException $e) {
                    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
                }
                ?>
                </div>
                <div id="annonces-droite">

                    <h3>Les participation à mes annonces : </h3>
                    <?php 
                    
                    $sql = "SELECT * FROM participation p JOIN utilisateurs u ON u.num_tel = p.Participant JOIN annonces a ON a.id = p.Annonce WHERE p.Participant='$proprietaire'";
                    $reponse = $pdo->query($sql);  
                    
                    $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);

                    foreach ($tableau as $item){

                        $Pseudo = $item->Pseudo;
                        if ($item->Pseudo === "") {
                            $Pseudo = $item->Prenom;
                        }

                        echo "
                        <p3>{$item->id}    </p3>
                        
                        ";

                    }
                    
                    ?>

                </div>

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

                        echo "<div class='elementParticipation'>
                    <div id='gauche2'>
                    <h1>{$Pseudo} participe </h1>
                    <h3>{$item->Titre}</h3>
                    
                    <p2>{$item->villeannonce} {$item->Lieu}</p2>
                    <p3>Le {$item->Date} à {$heure_debut}</p3>
                    <h5>{$item->Info_sup}</h5>
                    </div>

                    <div id='droite2'>
                        <img src='../Ressource/$theme.webp' alt='$theme' width='250px' height='auto' />
                        <div id='bouton'>
                            <input type='button' name='bouton-participer' value='participations' />
                            <input type='button' name='bouton-commenter' value='commentaires' />
                        </div>
                    </div>
        </div>";
                    }
                } catch (PDOException $e) {
                    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
                }

                ?>
            </div>


        </div>

    </main>

    <footer>
        <p> Â© 2022 - Bertille & Emma</p>
    </footer>


</body>

</html>