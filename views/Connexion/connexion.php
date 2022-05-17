<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- /*STYLE CSS POUR CONNEXION  */ -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>
    <!-- pour intérieur bouton -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>


    <title>Connexion</title>
</head>

<body>
    <div id="container">
        <form action="verification.php" method="POST">
            <legend>
                <h1>Connexion</h1>
            </legend>

            <label><b>Téléphone : </b></label>
            <input type="text" placeholder="Entrer un numéro de téléphone" pattern="[0-9]{10}" maxlength="10" name="Num_Tel" required />


            <tr>
                <td><label><b>Mot de passe : </b></label></td>
                <td style="display: block ruby">
                    <input type="password" id="motdepasse" placeholder="Entrer un mot de passe" name="Mdp" required>
                    <!-- <input type="checkbox" onclick="Afficher()"> -->
                </td>
            </tr>

            <input type="submit" id="submit" value="Connexion">

            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1 || $err == 2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect !</p>";
            }
            ?>

        </form>
    </div>
</body>

</html>
<html>