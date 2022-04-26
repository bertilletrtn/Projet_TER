<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link rel="stylesheet" href="site.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>

<header>
    <a href="#" class="logo">TitreDuSite</a>
    <!-- <div class="menuToggle" onclick="toggleMenu();"></div> -->
    <ul class="bar">
        <li><a href="#annonce" onclick="toggleMenu();">Les annonces</a></li>
        <li><a href="#poster" onclick="toggleMenu();">Poster</a></li>
        <a href="#" class="btn-compte"onclick="toggleMenu();">Compte</a>
    </ul>
</header>

 <body>
    <div id="global">
        <div id="contenu">
            <section class="filtre" id="filtre">
                <div id="left">LEFT</div>

            </section>

            <section class="lesannonces" id="lesannonces">
                <div id="right">

                <?php    

    //                 try{
    //                     require_once("connexpdo.inc.php");
    //                     //require_once("js.php");
    //                     $pdo = connexpdo("Projet");

    //                     $reponse = $pdo->query ('SELECT * FROM Annonces');
    //                     while($donnees = $reponse->fetch()){

    //                        echo "<div id='annonces'>";
    //                             echo $donnees['Lieu'];
    //                             echo "<br>";
    //                             echo $donnees['Heure'];
    //                             echo "<br>";
    //                             echo "<br>";
    //                             echo "<br>";
    //                             echo "</div>";
    //                     }
                
    //                 echo 'test';
    //                     // alert("Modele bien enregistré");
    //                     }
	// catch(PDOException $e){
    //     echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    // }
               
 ?>

                </div> 
                <a href="#top" id="scrollUp"><img src="../Ressource/to_top.png"/></a>
            </div>


        </div>

    </body>

    <div id="footer">
        <p> © 2022 - Bertille & Emma</p>
    </div>

    <script src="site.js"></script>

</html>