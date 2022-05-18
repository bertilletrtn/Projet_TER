<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="trtinfoperso.css" media="screen" type="text/css" />
    <title>Modifier mes informations</title>
</head>

<body>

    <div id="logo">
        <a href="../Site/site.php">Join and Enjoy</a>
    </div>

<?php

require_once("../Site/connexpdo.inc.php");

$pdo = connexpdo("Projet");

session_start();


if ($_SESSION['Num_Tel'] !== "") {
    $utilisateur = $_SESSION['Num_Tel'];
}

$sql = "SELECT * FROM utilisateurs WHERE Num_Tel=$utilisateur";

$reponse = $pdo->query($sql);

$tableau = $reponse->fetchAll(PDO::FETCH_OBJ);

foreach ($tableau as $item) :

    $prenom = $item->Prenom;
    $nom = $item->Nom;
    $pseudo = $item->Pseudo;
    $age = $item->Age;
    $num_tel = $item->Num_Tel;
    $ville = $item->Ville;
    $mdp = $item->Mdp;

?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded">


        <table>
            <tr>
                <td>Nom :</td>
                <td><input type="text" name="nom" pattern="[a-zA-Z]{2,}" size="40" maxlength="50" value=<?= $nom ?> /></td>
            </tr>
            <tr>
                <td>Prenom :</td>
                <td><input type="text" name="prenom" pattern="[a-zA-Z]{3,}" size="40" maxlength="50" value=<?= $prenom ?> /></td>
            </tr>
            <tr>
                <td>Pseudo :</td>
                <td><input type="text" name="pseudo" pattern="[a-zA-Z]{3,}" size="40" maxlength="50" value=<?= $pseudo ?>></td>
            </tr>
            <tr>
                <td>Ville :</td>
                <td><input type="text" name="ville" pattern="[a-zA-Z]{,}" size="40" maxlength="50" value=<?= $ville ?>></td>
            </tr>
            <tr>
                <td>Age :</td>
                <td><input type="text" name="age" size="40" pattern="[0-9]{2}" maxlength="50" value=<?= $age ?> /></td>
            </tr>
            <tr>
                <td>Mot de passe :</td>
                <td style="display: block ruby">
                    <input type="password" id="motdepasse" name="mdp" size="40" placeholder="Entrer un mdp" maxlength="50" required />
                    <input type="checkbox" onclick="Afficher()">
                </td>
            </tr>
            <!--faire un carre pour faire afficher le mdp-->
            <tr>
                <td>Confirmer le mot de passe :</td>
                <td><input type="password" name="mdpconfirm" size="40" placeholder="Confirmer le mdp" maxlength="50" required /></td>
            </tr>
            <tr>
                <div class="btn">
                    <td><input type="reset" value=" Effacer ">
                    <td><input type="submit" value="Enregistrer les modifications"></td>
                </div>
            </tr>
        </table>
    </form>

<?php endforeach ?>
<?php
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age'])) {
    echo("dans le if");
    try {
        $nom = $pdo->quote($_POST['nom']);
        $prenom = $pdo->quote($_POST['prenom']);
        $age = $pdo->quote($_POST['age']);
        $pseudo = $pdo->quote($_POST['pseudo']);
        $ville = $pdo->quote($_POST['ville']);

        $mdpn = $pdo->quote($_POST['mdp']);
        $mdpconfirm = $pdo->quote($_POST['mdpconfirm']);

        if ($mdpn != $mdpconfirm) {
            alert("Erreur : Le mot de passe ne correspond pas ! ");
            return;
        }


        $sql = "UPDATE utilisateurs SET Prenom=$prenom, Nom=$nom, Pseudo=$pseudo, Age=$age, Ville=$ville, Mdp=$mdpn WHERE Num_Tel=$utilisateur";


    
        $reponse = $pdo->query($sql);
        $tableau = $reponse->fetchAll(PDO::FETCH_OBJ);

        header("Refresh:0.5; url=infoPerso.php");
        alert("Vos informations on bien été modifiées ! ");
    } catch (PDOException $e) {
        // header("Refresh:0.5; url=infoPerso.php");
        alert("Le formulaire a mal été remplie ! Reccomnencez");
    }
}else{
}

?>


<script src="affichermdp.js"></script>


</body>

</html>