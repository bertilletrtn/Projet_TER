<?php
include('../Helpers/Text.php');
session_start();
?>
<!DOCTYPE html>

<html lang="fr">

<?php
        require_once("connexpdo.inc.php");


        //session_start();
        $pdo = connexpdo("Projet");

        $page = $_GET['page'] ?? 1;
        if (!filter_var($page, FILTER_VALIDATE_INT)) {
            throw new Exception('Numéro de page invalide');
        }

        // if ($page == '1'){
        //     header('Location: site.php');
        //     http_response_code(301);
        //     exit();
        // }

        $currentPage = (int)$page;
        if ($currentPage <= 0) {
            throw new Exception('Numero de page invalide');
        }

        $count = (int)$pdo->query('SELECT COUNT(id) FROM annonces')->fetch(PDO::FETCH_NUM)[0];
        $perPage = 5;
        $pages = ceil($count / $perPage);
        if ($currentPage > $pages) {
            throw new Exception('Cett page n\'existe pas');
        }

        $offset = $perPage * ($currentPage - 1);


        $sql = ("SELECT *, a.ville AS villeannonce FROM annonces a JOIN utilisateurs u ON a.proprietaire = u.num_tel ORDER BY date DESC LIMIT $perPage OFFSET $offset");
        $reponse = $pdo->query($sql);

        $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);

?>


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
    <form method="post">


        <?php
        include("../header.php");
        //include("trtFiltre.php");
        ?>

        <main>

            <div id="filtres">

                <form>
                    <div class="controls">

                        <fieldset>
                            <legend>Titre :</legend>
                            <input type="text" id="titreFiltre" pattern="{a-zA-Z}" name="titre" size="10">
                        </fieldset>
                        <fieldset>
                            <legend>Ville :</legend>
                            <input type="text" id="villeFiltre" pattern="{a-zA-Z}" name="ville" size="10">
                        </fieldset>
                        <fieldset>
                            <legend>Lieu :</legend>
                            <input type="text" id="lieuFiltre" pattern="{a-zA-Z}" name="lieu" size="10">
                        </fieldset>

                        <fieldset>
                            <legend>Date :</legend>
                            <input type="date" id="dateFiltre" name="dateFiltre">
                        </fieldset>

                        <fieldset>
                            <legend>Quels thèmes :</legend>
                            <div>
                                <input type="checkbox" id="coding" name="musiqueFiltre" value="musique">
                                <label for="coding">Musique</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="cinemaFiltre" value="cinema">
                                <label for="music">Cinéma</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="sportFiltre" value="sport">
                                <label for="music">Sport</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="travailFiltre" value="travail">
                                <label for="music">Travail</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="alimentationFiltre" value="alimentation">
                                <label for="music">Alimentation</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="cultureFiltre" value="culture">
                                <label for="music">Culture</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="barFiltre" value="bar">
                                <label for="music">Bar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="festivalFiltre" value="festival">
                                <label for="music">Festival</label>
                            </div>
                            <div>
                                <input type="checkbox" id="music" name="loisirFiltre" value="loisir">
                                <label for="music">Loisir</label>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Heure de Début :</legend>
                            </label>
                            <input id="appt-time" type="time" name="appt-time" min="00:00" max="23:59">
                            <span class="validity">
                        </fieldset>

                        <input type="reset" value="Oups je veux recommencer">
                        <input type="submit" value="Zzeee partyyy">

                    </div>
                </form>


            </div>

            <div id="annonces">
                <div class="event">
                    <div class="eventDate"> Date </div>
                    <div class="eventTitre"> Titre </div>
                    <div class="eventParticipant"> Participant </div>
                    <div class="eventOrganisateur"> Organisateur </div>
                </div>

                <!-- <div class="event_Mois">mettre le mois </div> -->

                <?php try {  ?>
                    <?php foreach ($tableau as $item) : ?>
                    <?php
                        $arr_heure_debut = explode(":", $item->HeureDebut);
                        $heure_debut = $arr_heure_debut[0] . ":" . $arr_heure_debut[1];
                
                        $arr_date_debut = explode("-", $item->Date);
                        $datee = $arr_date_debut[1] . "-" . $arr_date_debut[2];
                
                        $theme = $item->theme;
                
                        $Pseudo = $item->Pseudo;
                        if ($item->Pseudo === "") {
                            $Pseudo = $item->Prenom;
                        }
                    ?>

                        <div style="flex:center" class='elementannonce'>

                            <div class='event_date'> <?= $datee ?> à <?= $heure_debut ?></div>
                            <div class='event_titre'>
                                <a href='#'> <?= htmlentities($item->Titre) ?> </a>
                                
                            </div>
                            <div class='event_nbr_participant'> ??? </div>
                            <div class='event_organisateur'> <?= $Pseudo ?> </div>
                        </div>

                    <?php endforeach ?>
                <?php } catch (PDOException $e) {
                    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
                }
                ?>


                <div class="d-flex justify-content-between my-4">
                    <?php if ($currentPage > 1) : ?>
                        <?php
                        $link = "site.php";
                        if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1);
                        ?>
                        <a href="<?= $link ?>" class="btn btn-prmiary">&laquo; Page précédente</a>
                    <?php endif ?>
                    <?php if ($currentPage < $pages) : ?>
                        <a href="site.php?page=<?= $currentPage + 1 ?>" class="btn btn-prmiary ml-auto">Page suivante &raquo;</a>
                    <?php endif ?>
                </div>

            </div>


            <a href="#top" id="scrollUp"><img src="../Ressource/to_top.png" /></a>

        </main>

        <footer>
            <p> © 2022 - Bertille & Emma</p>
        </footer>
    </form>
</body>

</html>






<!-- //<div id='droite'>
                        //     <div id='bouton'>
                        //     <input type='submit' id='bouton-participer' value='participer'/>
                        //     <input type='button' id='bouton-commenter' value='Commenter'/>
                        //     </div>
                        // </div>

                        // <img src='../Ressource/$theme.webp' alt='$theme' width='250px' height='auto' /> -->