<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="inscription.css" media="screen" type="text/css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>
    <title>Inscription</title>
</head>

<body>

    <?php
    include("trtInscription.php");
    ?>

    <div id=contenu>

        <div id="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded">

                <h1>Inscription</h1>



                <table>
                    <tr>
                        <td>Nom :</td>
                        <td><input type="text" name="nom" placeholder="Entrer un nom" pattern="[a-zA-Z]{2,}" size="40" maxlength="50" required /></td>
                    </tr>
                    <tr>
                        <td>Prenom :</td>
                        <td><input type="text" name="prenom" placeholder="Entrer un Prénom" pattern="[a-zA-Z]{3,}" size="40" maxlength="50" required /></td>
                    </tr>
                    <tr>
                        <td>Pseudo :</td>
                        <td><input type="text" name="pseudo" placeholder="Entrer un Pseudo" pattern="[a-zA-Z]{3,}" size="40" maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td>Téléphone :</td>
                        <td><input type="tel" pattern="[0-9]{10}" placeholder="     XX XX XX XX XX" maxlength="10" name="tel" required /></td>
                    </tr>
                    <tr>
                        <td>Ville :</td>
                        <td><input type="text" name="ville" pattern="[a-zA-Z]{2,}" placeholder="Entrer un Ville" size="40" maxlength="50" /></td>
                    </tr>
                    <tr>
                        <td>Age :</td>
                        <td><input type="text" name="age" size="40" pattern="[0-9]{2}" placeholder="Entrer un âge" maxlength="50" required /></td>
                    </tr>
                    <tr>
                        <td>Mot de passe :</td>
                        <td style="display: block ruby">
                            <input type="password" id="motdepasse" name="mdp" size="40" placeholder="Entrer un mdp" maxlength="50" required />
                            <input type="checkbox" onclick="Afficher()">
                        </td>
                    </tr>
                    <tr>
                        <td>Confirmer le mot de passe :</td>
                        <td><input type="password" name="mdpconfirm" size="40" placeholder="Confirmer le mdp" maxlength="50" required /></td>
                    </tr>
                    <tr>
                        <div class="btn">
                            <td><input type="reset" value=" Effacer ">
                            <td><input type="submit" value=" Envoyer "></td>
                        </div>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="affichermdp.js"></script>


</body>

</html>