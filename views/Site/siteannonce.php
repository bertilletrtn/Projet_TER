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
    foreach ($tableau as $item) :
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

?>
    <?php endforeach ?>
<?php } catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
}

// echo '<pre>';
// var_dump($tableau);
// echo '</pre>';


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
    <from method="post">

        <div style="flex:center" class='elementannonce'>
            <!-- <form action="trtParticipation.php" method="post" enctype="application/x-www-form-urlencoded"> -->

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
                    <input type='submit' name='submit' value='commentaires' />
                </div>
            </div>
        </div>
        </div>
    </from>
</body>

<?php 
if(isset($_POST['submit'])) {
    echo("dans le if");

}else{
    echo("dans le else");
}



?>