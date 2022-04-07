<!DOCTYPE html>
<html dir="ltr" lang="fr-FR">
<!-- entete -->
<head>
    <meta charset="utf-8" />
    <title>Page de connexionltest</title>
    <link rel="stylesheet" href="connexion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<!-- contenu de la page -->
<body>

    <!--<button onclick="window.location.href = 'connexion.php'>Cliquez Ici </button> -->

<div class="page">
    <div class="container">


        <form action="verification.php" method="POST">
            <div class="login">connexion</div>
<!--
            <label for="tel">Téléphone : </label>
            <input type="tel" placeholder="Entrer un numéro de téléphone" pattern="[0-9]{10}" maxlength="10"  name="Num_Tel" required/> 

            <label for="password">Mot de passe : </label>
            <input type="password" placeholder="Entrer un mot de passe" nam="Mdp" required>

            <input type="submit" id="submit" value="LOGIN">
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>-->

<label><b>Nom d'utiliusernamesateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="Num_Tel" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="Mdp" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
        </form>
      
    </div>
</div>

<!--Ajouter un lien de contact en bas de la page ?-->

   <script src="app.js"></script> <!--notre script.js--> 
</body>
</html>




</form>
</body>
</html>

<!--
<!DOCTYPE html>
<html dir="ltr" lang="fr-FR">
 entete 
<head>
    <meta charset="utf-8" />
    <title>Page de connexionl</title>
    <link rel="stylesheet" href="connexion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
contenu de la page
<body>

    <button onclick="window.location.href = 'connexion.php'>Cliquez Ici </button> 

<div class="page">
    <div class="container">
      <div class="left">
        <div class="login">connexion</div>
        <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
      </div>
      <div class="right">
       

        <div class="form">

          <label for="tel">Téléphone : </label>
          <input input type="tel" pattern="[0-9]{10}" maxlength="10"  id="tel" /> 

          <label for="password">Mot de passe : </label>
          <input type="password" id="password">

          <input type="submit" id="submit" value="connexion">
        </div>
      </div>
    </div>
  </div>
  
   -Ajouter un lien de contact en bas de la page ?

   <script src="app.js"></script> notre script.js
</body>
</html>-->