<?php
session_start();
?>
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
    <form method="post">


        <?php
        include("../header.php");
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
                            <input id="time" type="time" name="time" min="00:00" max="23:59">
                            <span class="validity">
                        </fieldset>

                        <input type="reset" value="Oups je veux recommencer">
                        <input type="submit" value="Zzeee partyyy">

                    </div>
                </form>


            </div>

            <div id="annonces">

                <?php
                include("trtFiltre.php");
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