<!DOCTYPE html >
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="inscription.css" media="screen" type="text/css"/>
    <link rel="stylesheet" href="../header.css" type="text/css"/>

    <title>Inscription</title>
</head>
<body>

<?php
include("../header.php");
?>

<div id=contenu>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded">
        <!--Voir a quoi ca sert plus tars-->
        <fieldset>
            <legend>
                <h1>Inscription</h1>
            </legend>
            <table>
                <tr>
                    <td>Nom :</td>
                    <td><input type="text" name="nom" pattern="[a-zA-Z]{3,}" size="40" maxlength="50" required/></td>
                </tr>
                <tr>
                    <td>Prenom :</td>
                    <td><input type="text" name="prenom" size="40" maxlength="50" required/></td>
                </tr>
                <tr>
                    <td>Pseudo :</td>
                    <td><input type="text" name="pseudo" size="40" maxlength="50" /></td>
                </tr>
                <tr>
                    <td>Téléphone :</td>
                    <td><input type="tel" pattern="{10}" maxlength="10" name="tel" required /></td>
                </tr>
                <tr>
                    <td>Ville :</td>
                    <td><input type="text" name="ville" size="40" maxlength="50"/></td>
                </tr>
                <tr>
                    <td>Age :</td>
                    <td><input type="text" name="age" size="40" maxlength="50" required/></td>
                </tr>
                <tr>
                    <td>Mot de passe :</td>
                    <td><input type="password" name="mdp" size="40" maxlength="50" required/></td>
                </tr>   <!--faire un carre pour faire afficher le mdp--> <tr>
                    <td>Confirmer le mot de passe :</td>
                    <td><input type="password" name="mdpconfirm" size="40" maxlength="50" required/></td>
                </tr>   <!--faire un carre pour faire afficher le mdp-->
                <tr>
                    <td><input type="reset" value=" Effacer "></td>
                    <td><input type="submit" value=" Envoyer "></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
<?php
include("../BDD/connexionpdo.php");
$idcom = connexpdo("Projet");
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tel']) && !empty($_POST['age']) && !empty($_POST['mdp'])) {
    try {
        $nom = $idcom -> quote($_POST['nom']);
        $prenom = $idcom -> quote($_POST['prenom']);
        $tel = $idcom -> quote($_POST['tel']);
        $age = $idcom -> quote($_POST['age']);
        $mdp = $idcom -> quote($_POST['mdp']);
        $mdpconfirm = $idcom -> quote($_POST['mdpconfirm']);
        $pseudo = $idcom -> quote($_POST['pseudo']);
        $ville = $idcom -> quote($_POST['ville']);

        if($mdp != $mdpconfirm){
            alert("Erreur : Le mot de passe ne correspond pas ! ");
            return;
        }

        $query = "INSERT INTO utilisateurs VALUES($nom,$prenom,$pseudo,$age,$tel,$ville,$mdp)";
        $nb = $idcom -> exec($query);
        if($nb != 1) {
            alert("Erreur : \"$idcom->errorCode()\"");
        } else {
            // alert("Modèle bien enregistré !");
            header('Location: ../Connexion/connexion.php');
            exit();

        }
    } catch(PDOException $e) {
        displayException($e);
        exit();
    }
} else {
    echo "<h3>Formulaire à compléter !</h3>";
}
?>
</body>
</html>