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
    include("trtInscription.php");
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
</body>
</html>