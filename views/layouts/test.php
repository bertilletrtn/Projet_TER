<?php
session_start();
if(!empty($_POST)):
    //Vérification et sécurisation des valeurs de $_POST
    //Cela nettoye le contenu des champs postés pour éviter les failles, et vérifie que tous les champs soient bien remplis
    //Si un champ est vide, on bascule sur une erreur, reprise plus loin dans le script
    $emptyField = false;
    foreach(array_keys($_POST) as $key)
    {
        if(!empty($_POST[$key]))
        {
            $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $_SESSION['post'][$key] = $_POST[$key];
        }
        else
        {
            $emptyField = true;
        }
    }
    //On vérifie que les champs soient tous clean et remplis.
    if(!$emptyField)
    {
        //On vérifie que l'email est bien un email selon RFC
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            //On vérifie que le téléphone soit bien un nombre de longueur 10 caractères
            if(filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT) && strlen($_POST['telephone'])==10)
            {
                //On défini les éléments du mail à envoyer
                $mailDest =  'mon_email@yopmail.com';
                $mailObj =  $objet = 'Soumettre un événement';
 
                $mailHeaders  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                $mailHeaders .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
                $mailHeaders .= 'To: ' . $mailDest . "\n"; // Mail de reponse
                $mailHeaders .= 'From: ' . '<' . $_POST['email'] . '>' . "\n"; // Expediteur
 
                $mailContent = '<strong>Nom :</strong> ' . $_POST['nom'] . '<br><strong>Telephone :</strong>' . $_POST['telephone'] . '<br><br>' .$_POST['message'];
 
                if(mail($mailDest, $mailObj, $mailContent, $mailHeaders))
                {
                    $_SESSION['flash']['success'] = "Votre mail nous a bien été envoyé. Vous aurez une réponse d'ici peu.";
                    unset($_SESSION['post']);
                    header('Location: form.php');
                    exit();
                }
                else
                {
                    $_SESSION['flash']['danger'] = "Votre email n'a pas été envoyé correctement. Merci de réessayer.";
                    header('Location: form.php');
                    exit();
                }
            }
            else
            {
                $_SESSION['flash']['danger'] = "Votre numéro de téléphone n'est pas valide";
                header('Location: form.php');
                exit();
            }
        }
        else
        {
            $_SESSION['flash']['danger'] = "Votre email n'est pas valide";
            header('Location: form.php');
            exit();
        }
    }
    else
    {
        $_SESSION['flash']['danger'] = "Vous n'avez pas rempli tous les champs requis";
        header('Location: form.php');
        exit();
    }
endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- l'affichage occupe tout l'espace disponible avec une taille de 1, autrement dit sans zoom -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Formulaire</title>
    </head>
    <body>
        <div class="container">
            <div class="formulaire">
                <div id="bloc">
                <?php
                  if(isset($_SESSION['flash'])) {
                      foreach ($_SESSION['flash'] as $key => $message) {
                        echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                      }
                      unset($_SESSION['flash']);
                  }
                  ?>
                    <form method="POST" action="">
                        <fieldset>
                            <legend>Mon formulaire de contact</legend>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <p>
                                        <label>Votre nom</label>
                                        <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?= (isset($_SESSION['post']['nom'])) ? $_SESSION['post']['nom'] : ''; ?>" />
                                    </p>
                                    <p>
                                        <label>Votre numéro de télépone (format 0123456789)</label>
                                        <input type="telephone" name="telephone" pattern="[0-9]{10}" maxlength="10" placeholder="Téléphone" class="form-control" value="<?= (isset($_SESSION['post']['telephone'])) ? $_SESSION['post']['telephone'] : ''; ?>" />
                                    </p>
                                    <p>
                                        <label>Votr e-mail</label>
                                        <input type="email" name="email" placeholder="Entrez votre e-mail" class="form-control" value="<?= (isset($_SESSION['post']['email'])) ? $_SESSION['post']['email'] : ''; ?>" />
                                    </p>
                                </div>
         
                                <div class="col-xs-12 col-sm-6">
                                    <p>
                                        <label>Votre message</label>
                                        <textarea rows="10" cols="50" name="message" placeholder="Votre message" class="form-control"><?= (isset($_SESSION['post']['message'])) ? $_SESSION['post']['message'] : ''; ?></textarea>
                                    </p>
                                </div>
         
                                <div class="col-12">
                                    <input type="submit" name="envoi" value="Envoyer" class="btn btn-primary">
                                </div>
                            </div><br>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
    </body>
</html>