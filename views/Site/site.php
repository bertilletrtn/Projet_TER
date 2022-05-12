<?php

require "../../src/Helpers/Text.php";
require "../layouts/header.html";
session_start();
?>
<!--JQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="test/javascript" src="filter.js"></script>

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
$perPage = 8;
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
    <link rel="stylesheet" href="../layouts/header.css">
    <link rel="stylesheet" href="../layouts/footer.css">


    <title>Join and Enjoy</title>
</head>


<body>
<form action="trtCompte.php" method="post" enctype="application/x-www-form-urlencoded">

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
                                <input type="checkbox" id="musique" name="musiqueFiltre" value="product_check">
                                <label for="coding">Musique</label>
                            </div>
                            <div>
                                <input type="checkbox" id="cinema" name="cinemaFiltre" value="product_check">
                                <label for="music">Cinéma</label>
                            </div>
                            <div>
                                <input type="checkbox" id="sport" name="sportFiltre" value="product_check">
                                <label for="music">Sport</label>
                            </div>
                            <div>
                                <input type="checkbox" id="travail" name="travailFiltre" value="product_check">
                                <label for="music">Travail</label>
                            </div>
                            <div>
                                <input type="checkbox" id="alimentation" name="alimentationFiltre" value="product_check">
                                <label for="music">Alimentation</label>
                            </div>
                            <div>
                                <input type="checkbox" id="culture" name="cultureFiltre" value="product_check">
                                <label for="music">Culture</label>
                            </div>
                            <div>
                                <input type="checkbox" id="bar" name="barFiltre" value="product_check">
                                <label for="music">Bar</label>
                            </div>
                            <div>
                                <input type="checkbox" id="festival" name="festivalFiltre" value="product_check">
                                <label for="music">Festival</label>
                            </div>
                            <div>
                                <input type="checkbox" id="loisir" name="loisirFiltre" value="product_check">
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

                <?php require_once('afficherannonce.php'); ?>


                <div class="d-flex justify-content-between my-4">
                    <?php if ($currentPage > 1) : ?>
                        <?php $link = "site.php"; ?>

                        <?php
                        if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1);
                        ?>
                        <div class="wrapper">
                            <b class="cta1">
                                <a class="cta" class="cta1" href="<?= $link ?>" class="btn">
                                    <span>Précédent</span>
                                    <span>
                                        <svg width="20px" height="15px" viewBox="0 -5 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                                <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                                <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            </b>

                        <?php endif ?>


                        <?php if ($currentPage < $pages) : ?>
                            <b class="cta2">
                                <a class="cta" href="site.php?page=<?= $currentPage + 1 ?>" class="btn">
                                    <span>Suivant</span>
                                    <span>
                                        <svg width="20px" height="15px" viewBox="0 -5 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                                <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                                <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            </b>
                        </div>
                    <?php endif ?>
                </div>

            </div>


            <a href="#top" id="scrollUp"><img src="../../Ressource/to_top.png" /></a>

        </main>
    </form>
    <?php require "../layouts/footer.html"; ?>

    <!-- <script type="text/javascript" src="../js//app.js"></script> -->
    <script type="test/javascript" src="filter.js"></script>
</body>



</html>






<!-- //<div id='droite'>
                        //     <div id='bouton'>
                        //     <input type='submit' id='bouton-participer' value='participer'/>
                        //     <input type='button' id='bouton-commenter' value='Commenter'/>
                        //     </div>
                        // </div>
                        // <img src='../Ressource/$theme.webp' alt='$theme' width='250px' height='auto' /> -->