site.php de cote
<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link rel="stylesheet" href="site.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>



<body>

    <header>
        <a href="#" class="logo">TitreDuSite</a>
        <ul class="bar">
            <li><a href="#annonce" onclick="toggleMenu();">Les Annonces</a></li>
            <li><a href="#poster" onclick="formulaireannonce.php">Poster</a></li>
            <a href="#" class="btn-compte" onclick="toggleMenu();">Compte</a>
        </ul>
    </header>



    <div id="global">
        <section class="filtre" id="filtre">
            <div id="left">LEFT</div>
        </section>

        <section class="lesannonces" id="lesannonces">
            <div id="right">RIGHT -->

            <?php

try {
    require_once("connexpdo.inc.php");
    //require_once("js.php");
    $pdo = connexpdo("Projet");

    $reponse = $pdo->query('SELECT * FROM Annonces');
    while ($donnees = $reponse->fetch()) {

        echo "<div id='annonces'>";
        echo $donnees['Lieu'];
        echo "<br>";
        echo $donnees['HeureDebut'];
        echo "<br>";
        echo $donnees['HeureFin'];
        echo "<br>";
        echo $donnees['Ville'];
        echo "<br>";
        echo $donnees['Date'];
        echo "<br>";
        echo $donnees['Info_sup'];
        echo "<br>";
        echo "</div>";
    }

    // alert("Modele bien enregistré");
} catch (PDOException $e) {
    echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
}

?>

</div>
<a href="#top" id="scrollUp"><img src="../Ressource/to_top.png" /></a>


</div>


<footer>
uigiygigiugi
<p> © 2022 - Bertille & Emma</p>
</footer>


</body>



<script src="site.js"></script>

</html>