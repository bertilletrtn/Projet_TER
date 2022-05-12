<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <div id="container">
        <form action="verification.php" method="POST">
            <h1>Connexion</h1>

            <label><b>Téléphone : </b></label>
            <input type="text" placeholder="Entrer un numéro de téléphone" pattern="[0-9]{10}" maxlength="10" name="Num_Tel" required />

            <label><b>Mot de passe : </b></label>
            <input type="password" placeholder="Entrer un mot de passe" name="Mdp" required>

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