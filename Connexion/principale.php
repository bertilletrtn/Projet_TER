<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['Num_Tel'] !== ""){
                    $user = $_SESSION['Num_Tel'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté";
                    // envoyer vers la page avec les annonces
                    header('Location: ../Accueil/pageacceuil.html');
                    exit();
                }
            ?>
            
        </div>
    </body>
</html>