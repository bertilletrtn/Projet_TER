<?php
// require "../layouts/header.html";
require_once("connexpdo.inc.php");
$pdo = connexpdo("Projet");


$url = $_SERVER['REQUEST_URI'];
$theid = substr($url, strrpos($url, "?"), strlen($url));


$primary = explode("?", $theid);
$cle = $primary[1];

$sql = ("SELECT * FROM annonces WHERE id=$cle");

$reponse = $pdo->query($sql);

$tableau = $reponse->fetchAll(PDO::FETCH_OBJ);

try {
    foreach ($tableau as $item) {
        $arr_heure_debut = explode(":", $item->HeureDebut);
        $heure_debut = $arr_heure_debut[0] . ":" . $arr_heure_debut[1];

        $arr_heure_fin = explode(":", $item->HeureFin);
        $heure_fin = $arr_heure_fin[0] . ":" . $arr_heure_fin[1];

        $arr_date_debut = explode("-", $item->Date);
        $datee = $arr_date_debut[1] . "-" . $arr_date_debut[2];

        $theme = $item->theme;

        // $Pseudo = $item->Pseudo;
        // if ($item->Pseudo === "") {
        //     $Pseudo = $item->Prenom;
        // }

        $id = $item->id;
    }
} catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
}

$requete = ("SELECT *, u.Prenom FROM commentaires c JOIN utilisateurs u ON c.id_utilisateur=u.Num_Tel WHERE c.num_annonce=$cle ORDER BY date DESC");

$result = $pdo->query($requete);

$liste = $result->fetchAll(PDO::FETCH_OBJ);




?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="siteannonce.css">
    <title>Annonce</title>
</head>

<body>
    <!-- <form action="trtCommentaire.php" method="post" enctype="application/x-www-form-urlencoded"> -->
        <div style="flex:center" class='elementannonce'>

            <div id='gauche'>
                <h1><?php echo "$item->Ville" ?></h1>
                <p1><?php echo "$item->Lieu" ?> </p1>
                <p2><?php echo "$item->Titre" ?></p2>
                <p3>Le <?php echo "$item->Date" ?> à <?php echo "$heure_debut" ?> et finir vers <?php echo "$heure_fin" ?></p3>
                <h3><?php echo "$item->Info_sup" ?></h3>
            </div>


            <div id='droite'>
                <img src='../../Ressource/<?php echo "$item->theme" ?>.webp' alt='theme' width='250px' height='auto' />
                <div id='bouton'>
                    <p> <a href='trtParticipation.php?<?= $id ?>'> Participation </a></p><br>

                    <!-- <p><a href='trtCommentaire.php?<?= $id ?>'> Commentaires </a></p> -->

                </div>
            </div>
        </div>
        <div style="flex:center" class='commentaires'>
            <form action='trtCommentaire.php?<?= $id ?>' method="post" enctype="application/x-www-form-urlencoded">

                <div class='postercommentaire'>
                    <textarea style="resize: none;" maxlength="499" name="commentaire" cols=80 rows=3> Commenter </textarea>
                    <input type='submit' name='submit' value='Poster' />
                </div>

                <div class='listecommentaire'>
                    <div class="event">
                        <div class="eventechange"> Les commentaires déjà en ligne :  </div>
                    </div>

                    <?php
                    try {
                        foreach ($liste as $elem) : ?>

                        <?php

                            $num_annonce = $elem->num_annonce;

                            $commentaire = $elem->commentaire;

                            $trtdate = explode(" ", $elem->date);
                            $date = $trtdate[0];

                            $trttime = explode(":", $trtdate[1]);
                            $time = $trttime[0] . ":" . $trttime[1];


                            // $arr_date_debut = explode("-", $elem->date);
                            // $datee = $arr_date_debut[1] . "-" . $arr_date_debut[2];

                            // $datee = $elem->date;

                            $id_commentaire = $elem->id_commentaire;

                            $prenom = $elem->Prenom;

                            ?>
                        
                        <div style="flex:center" class='elementlistecommentaire'>

                            <div class='date_com'>Le <?= $date ?> à <?= $time ?> <?= $prenom ?> à dit : </div>
                            <div class='com'> <?= $commentaire ?> </div>

                        </div>
                        <?php endforeach ?>
                    <?php } catch (PDOException $e) {
                        echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
                    }
                    ?>
                </div>
            </from>
        </div>

        
</body>