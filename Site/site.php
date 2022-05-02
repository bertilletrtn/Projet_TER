<!DOCTYPE html>

<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="../footer.css">


    <title>Site principal</title>
</head>



<body>
    <form method="post">
    <header>
        <a href="../Site/site.php" class="logo">Join and Enjoy</a>
        <ul class="bar">
            <li><a href="" >Les Annonces</a></li>
            <li><a href="" onclick="formulaireannonce.php">Poster</a></li>
            <li><a href="../Compte/Compte.html" class="btn-compte">Compte</a></li>
        </ul>
    </header>

    <main>

        <div id="filtres">
            FILTRE
        </div>

        <div id="annonces">
            <?php
            try {
                require_once("connexpdo.inc.php");


                //session_start();
                $pdo = connexpdo("Projet");

                $sql = "SELECT *, a.ville AS villeAnnonce FROM Annonces a JOIN Utilisateurs u ON a.Proprietaire = u.Num_Tel ORDER BY Date DESC";
                $reponse = $pdo->query($sql);

                $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);


                foreach ($tableau as $item) {
                    $arr_heure_debut = explode(":", $item->HeureDebut);
                    $heure_debut = $arr_heure_debut[0] . ":" . $arr_heure_debut[1];

                    $theme = $item->Theme;

                    $Pseudo = $item->Pseudo;
                    if ($item->Pseudo == "") {
                        $Pseudo = $item->Prenom;
                    }

                    // echo "<pre>";
                    // var_dump($item);
                    // echo "</pre>";


                   	

                    echo "<div class='elementannonce'>
                    <div id='gauche'>
                            <h1>{$item->Titre}</h1>
                            <p1>{$Pseudo} propose </p1>
                            <p2>{$item->villeAnnonce} {$item->Lieu}</p2>
                            <p3>Le {$item->Date} à {$heure_debut}</p3>
                            <h5>{$item->Info_sup}</h5>
                    </div>
                
   
                    <div id='droite'>

                        <img src='../Ressource/$theme.webp' alt='$theme' width='250px' height='auto' />

                        <div id='bouton'>
                        <input type='submit' id='bouton-participer' value='participer'/>
                        <input type='button' id='bouton-commenter' value='Commenter'/>
                        </div>
                    </div>

                 </div>";
                 
                 if (isset($_POST['bouton-participer']))
                 {
                    $annonce = $pdo->query("SELECT id FROM ANNONCES");

                    if($_SESSION['Num_Tel'] !== ""){
                        $participant = $_SESSION['Num_Tel'];
                         // afficher un message
                        echo "Bonjour $participant, vous êtes connecté";
                        
                        // exit();
                        }
                    $query = "INSERT INTO Participation VALUES($participant,$annonce)";
                }
                 

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