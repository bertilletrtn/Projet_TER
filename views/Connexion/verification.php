<?php
session_start();
if (isset($_POST['Num_Tel']) && isset($_POST['Mdp'])) {
   // connexion à la base de données
   $db_username = 'root';
   $db_password = '';
   $db_name     = 'Projet';
   $db_host     = 'localhost';
   $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
      or die('could not connect to database');

   // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
   // pour éliminer toute attaque de type injection SQL et XSS
   $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['Num_Tel']));
   $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['Mdp']));

   if ($username !== "" && $password !== "") {
      $requete = "SELECT count(*) FROM utilisateurs where 
              Num_Tel = '" . $username . "' and Mdp = '" . $password . "' ";
      $exec_requete = mysqli_query($db, $requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
      if ($count != 0) // nom d'utilisateur et mot de passe correctes
      {
         $_SESSION['Num_Tel'] = $username;
         header('Location: principale.php');
      } else {
         header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }
   } else {
      header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
   }
} else {
   header('Location: connexion.php');
}
mysqli_close($db); // fermer la connexion
