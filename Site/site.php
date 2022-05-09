
<!DOCTYPE html>

<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="../footer.css">


    <title>Join and Enjoy</title>
</head>


<body>
    <form action="trtParticipation.php" method="post" enctype="application/x-www-form-urlencoded">
        <?php
        include("../header.php");
        ?>

        <main>

            <div id="filtres">
                FILTRE
            </div>

            <div id="annonces">
                <?php

                try {
                    require_once("connexpdo.inc.php");

                    $pdo = connexpdo("Projet");

                    // if ($_SESSION['Num_Tel'] !== "") {
                    //     $participant = $_SESSION['Num_Tel'];
                    //     // afficher un message
                    //     echo "Bonjour $participant, vous êtes connecté";
                    // }

                    $sql = "SELECT *, a.ville AS villeannonce FROM annonces a JOIN utilisateurs u ON a.proprietaire = u.num_tel ORDER BY date DESC";
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

                        $id_annonce = $item->id;
                        // alert($id_annonce); 

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
                            <input type='submit' id='$id_annonce' name='bouton-participer' value='participer' />
                            <input type='button' name='bouton-commenter' onclick=window.location.href='trtCommentaire.php'; value='Commenter' />
                        </div>
                    </div>
        </div>";

                    }
                } catch (PDOException $e) {
                    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
                }
                ?>
            </div>


            <a href="#top" id="scrollUp"><img src="../Ressource/to_top.png" /></a>

        </main>

        <footer>
            <p> © 2022 - Bertille & Emma</p>
        </footer>
    </form>
</body>

</html>