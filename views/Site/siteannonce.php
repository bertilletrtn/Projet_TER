
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="siteannonce.css">

        <?php require('siteannonce1.php'); ?>

        <title>Annonce</title>
    </head>
    
    <body>
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
                    <input type='button' name='bouton-participer' value='participations' />
                    <input type='button' name='bouton-commenter' value='commentaires' />
                </div>
            </div>
        </div>
        </div>
    </body>
    