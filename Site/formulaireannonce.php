<html>
    <head>
        <meta charset="utf-8" >
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="formulaireannonce.css" />
    </head>
<!-- contenu de la page -->
    <body>
        <div id="contenu">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="application/x-www-form-urlencoded">    <!--Voir a quoi ca sert plus tars-->
                <h1>Poster une annonce : </h1>

                <p>
                <label><b>Le titre : </b></label>
                <input type="text" placeholder="Entrer un titre" maxlength="100"  name="titre" size="20" /> 
                </p>
                
                <p>
                <label><b>La ville : </b></label>
                <input type="text" placeholder="Entrer une ville" maxlength="50"  name="ville" size="20"/> 
                </p>

                <p>
                <label><b>Le lieu : </b></label>
                <input type="text" placeholder="Entrer un lieu" maxlength="50"  name="lieu" size="20" /> 
                </p>

                <p>
                <label><b>Quelle date : </b></label>
                <input type="date" name="date" size="20" >
                </p>

                <p>
                <label><b>Quelle plage horaire : </b></label>
                </br>
                <label>Heure début</label>
                <input type="time" id="hdebut" name="hdebut" value="09:00" >

                </br>
                <label>Heure fin</label>
                <input type="time" id="hfin" name="hfin" value="20:00" >
                </p>

            
                <p>
                <label><b>Thème : </b></label>
                <select name="theme1">
                    <option value="autres" checked="checked">Autres</option>
                    <option value="musique">Musique</option>
                    <option value="cinema">Cinéma</option>
                    <option value="sport">Sport</option>
                    <option value="travail">Travail</option>
                    <option value="alimentation">Alimentation</option>
                    <option value="culture">Culture</option>
                    <option value="bar">Bar</option>
                    <option value="festival">Festival</option>
                    <option value="loisir">Loisir</option>

                </select>
                
                <select name="theme2">
                    <option value="not"> </option>
                    <option value="autres">Autres</option>
                    <option value="musique">Musique</option>
                    <option value="cinema">Cinéma</option>
                    <option value="sport">Sport</option>
                    <option value="travail">Travail</option>
                    <option value="alimentation">Alimentation</option>
                    <option value="culture">Culture</option>
                    <option value="bar">Bar</option>
                    <option value="festival">Festival</option>
                    <option value="loisir">Loisir</option>

                </select>

                <select name="theme3">
                    <option value="not"> </option>
                    <option value="autres">Autres</option>
                    <option value="musique">Musique</option>
                    <option value="cinema">Cinéma</option>
                    <option value="sport">Sport</option>
                    <option value="travail">Travail</option>
                    <option value="alimentation">Alimentation</option>
                    <option value="culture">Culture</option>
                    <option value="bar">Bar</option>
                    <option value="festival">Festival</option>
                    <option value="loisir">Loisir</option>
                    
                </select>
                </p>

                <p>
                <label><b>Informations supplémentaires : </b></label>
                </br>
                <textarea name="infosup" rows="" cols="20" style="resize: none;" ></textarea>
                </p>

                <p>
                <input type="reset" name="effacer" value=" Effacer ">
                <input type="submit" name="poster" value="Poster">
                </p>

            </form>

         </div>

<?php


// include ("../BDD/connexionpdo.php");
include ("../Connexion/connexionpdo.php");

session_start();

$idcom = connexpdo("Projet");



if($_SESSION['Num_Tel'] !== ""){
$propri = $_SESSION['Num_Tel'];
 // afficher un message
echo "Bonjour $propri, vous êtes connecté";

// exit();
}

// $idcom = connexpdo("Projet");

 if (! empty($_POST['titre']) && ! empty($_POST['ville']) && ! empty($_POST['lieu']) && ! empty($_POST['date']) && ! empty($_POST['hdebut']) && ! empty($_POST['hfin']) && ! empty($_POST['theme1']) ) {
    try {

        $titre = $idcom->quote($_POST['titre']);
        $ville = $idcom->quote($_POST['ville']);
        $lieu = $idcom->quote($_POST['lieu']);
        $date = $idcom->quote($_POST['date']);
        $hdebut = $idcom->quote($_POST['hdebut']);
        $hfin = $idcom->quote($_POST['hfin']);
        $theme1 = $idcom->quote($_POST['theme1']);
        $theme2 = $idcom->quote($_POST['theme2']);
        $theme3 = $idcom->quote($_POST['theme3']);
        $infosup = $idcom->quote($_POST['infosup']);


            if (("not" != $_POST['theme2']) && ("not" != $_POST['theme3']) && ! empty($_POST['infosup']) ) {


                $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,$theme2,$theme3,$infosup,$propri,$titre)";
                $nb = $idcom->exec($query);
                if ($nb != 1) {
                    alert("Erreur : \"$idcom->errorCode()\"");
                }else {
                    alert("Modèle bien enregistré !");
                }
            }

            else{
                echo "<h3>PROBLEME 1!! </h3>";
            }

            if (("not" == $_POST['theme2']) && ("not" == $_POST['theme3']) && empty($_POST['infosup']) ) {

                    $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,NULL,NULL,NULL,$propri,$titre)";
                    $nb = $idcom->exec($query);
                    if ($nb != 1) {
                        alert("Erreur : \"$idcom->errorCode()\"");
                    }else {
                        alert("Modèle bien enregistré !");
                    }
                }
            else{
                    echo "<h3>PROBLEME 2!! </h3>";
                }

            if (("not" == $_POST['theme2']) && ("not" != $_POST['theme3']) && ! empty($_POST['infosup']) ){
                    
                    $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,NULL,$theme3,$infosup,$propri,$titre)";
                    $nb = $idcom->exec($query);
                    if ($nb != 1) {
                        alert("Erreur : \"$idcom->errorCode()\"");
                    }else {
                        alert("Modèle bien enregistré !");
                    }
                }

                else{
                    echo "<h3>PROBLEME 3!! </h3>";
                }

            if (("not" != $_POST['theme2']) && ("not" == $_POST['theme3']) && ! empty($_POST['infosup']) ){
                    
                    $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,$theme2,NULL,$infosup,$propri,$titre)";
                    $nb = $idcom->exec($query);
                    if ($nb != 1) {
                        alert("Erreur : \"$idcom->errorCode()\"");
                    }else {
                        alert("Modèle bien enregistré !");
                    }
                }

                else{
                    echo "<h3>PROBLEME 4!! </h3>";
                }

            if (("not" != $_POST['theme2']) && ("not" != $_POST['theme3']) && empty($_POST['infosup']) ){
                    
                    $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,$theme2,$theme3,NULL,$propri,$titre)";
                    $nb = $idcom->exec($query);
                    if ($nb != 1) {
                        alert("Erreur : \"$idcom->errorCode()\"");
                    }else {
                        alert("Modèle bien enregistré !");
                    }
                }

                else{
                    echo "<h3>PROBLEME 5 !! </h3>";
                }
                
            if (("not" == $_POST['theme2']) && ("not" == $_POST['theme3']) && ! empty($_POST['infosup']) ){
                    
                    $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,NULL,NULL,$infosup,$propri,$titre)";
                    $nb = $idcom->exec($query);
                    if ($nb != 1) {
                        alert("Erreur : \"$idcom->errorCode()\"");
                    }else {
                        alert("Modèle bien enregistré !");
                    }
                }

                else{
                    echo "<h3>PROBLEME 6!! </h3>";
                }

            if (("not"== $_POST['theme2']) && ("not" != $_POST['theme3']) && empty($_POST['infosup']) ){
                    
                    $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,NULL,$theme3,NULL,$propri,$titre)";
                    $nb = $idcom->exec($query);
                    if ($nb != 1) {
                        alert("Erreur : \"$idcom->errorCode()\"");
                    }else {
                        alert("Modèle bien enregistré !");
                    }
                }


                else{
                    echo "<h3>PROBLEME 7!! </h3>";
                }


            if (("not" != $_POST['theme2']) && ("not" == $_POST['theme3']) && empty($_POST['infosup']) ){
                    
                echo "<h3>test 8!! </h3>";

                    $query = "INSERT INTO Annonces VALUES($ville,$lieu,$date,$hdebut,$hfin,$theme1,$theme2,NULL,NULL,$propri,$titre)";
                    $nb = $idcom->exec($query);

                    echo "<h3>test 8 bis !! </h3>";
                    if ($nb != 1) {
                        alert("Erreur : \"$idcom->errorCode()\"");
                    }else {
                        alert("Modèle bien enregistré !");
                    }
                }
                
            else{
                echo "<h3>PROBLEME 8!! </h3>";
            }
            

    } catch (PDOException $e) {
        displayException($e);
        exit();
    }
} else {
    echo "<h3>Formulaire à compléter !</h3>";
}


?>

</body>
</html>