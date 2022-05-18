<?php try {  ?>



    <?php foreach ($tableau as $item) : ?>
        <?php
        $arr_heure_debut = explode(":", $item->HeureDebut);
        $heure_debut = $arr_heure_debut[0] . ":" . $arr_heure_debut[1];

        $arr_date_debut = explode("-", $item->Date);
        $datee = $arr_date_debut[1] . "-" . $arr_date_debut[2];

        $arr_heure_fin = explode(":", $item->HeureFin);
        $heure_fin = $arr_heure_fin[0] . ":" . $arr_heure_fin[1];

        $theme = $item->theme;
        $theme2 = $item->theme3;
        $theme3 = $item->theme2;

        $ville = $item->villeannonce;

        $lieu = $item->Lieu;

        $info_sup = $item->Info_sup;

        $proprietaire = $item->Proprietaire;

        $id = $item->id;

        $Pseudo = $item->Pseudo;
        if ($item->Pseudo === "") {
            $Pseudo = $item->Prenom;
        }

        $id = $item->id;
        $tableau['pseudo'] = $Pseudo;
        $tableau['date'] = $datee;
        $tableau['heuredebut'] = $heure_debut;
        $tableau['heurefin'] = $heure_fin;
        $tableau['titre'] = $item->Titre;
        $tableau['ville'] = $ville;
        $tableau['lieu'] = $lieu;
        $tableau['theme'] = $theme;
        $tableau['theme2'] = $theme2;
        $tableau['theme3'] = $theme3;
        $tableau['info_sup'] = $info_sup;
        $tableau['proprietaire'] = $proprietaire;
        $tableau['id'] = $id;

        ?>

        <div style="flex:center" class='elementannonce'>

            <div class='event_date'> <?= $tableau['date'] ?> à <?= $tableau['heuredebut'] ?></div>
            <div class='event_titre'>
                <a href='siteannonce.php?<?= $id ?>'> <?= htmlentities(Text::excerpt($tableau['titre'])) ?> </a>

            </div>
            <div class='event_nbr_participant'> <?=  $tableau['ville'] ?> </div>
            <div class='event_organisateur'> <?= $tableau['pseudo']  ?> </div>
        </div>

    <?php endforeach ?>
<?php } catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
}
?>