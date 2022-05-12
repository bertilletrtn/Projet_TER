<?php
// require "../layouts/header.html";
require_once("connexpdo.inc.php");
$pdo = connexpdo("Projet");


$url = $_SERVER['REQUEST_URI'];
$theid = substr($url, strrpos($url, "?"), strlen($url));


$primary = explode("?", $theid);
$cle = $primary[1];

$sql = ("SELECT * FROM annonces WHERE id='$cle'");
$reponse = $pdo->query($sql);
$tableau = $reponse->fetchAll(PDO::FETCH_OBJ);

if ($tableau == array()) {
    header("Refresh:0; url=site.php");
    alert("OUPS une erreur est survenu, le numéro d'annonce que vous recherchez n'exsite pas.");
} else{
    try {
        foreach ($tableau as $item) :
            $arr_heure_debut = explode(":", $item->HeureDebut);
            $heure_debut = $arr_heure_debut[0] . ":" . $arr_heure_debut[1];

            $arr_heure_fin = explode(":", $item->HeureFin);
            $heure_fin = $arr_heure_fin[0] . ":" . $arr_heure_fin[1];

            $arr_date_debut = explode("-", $item->Date);
            $datee = $arr_date_debut[1] . "-" . $arr_date_debut[2];

            $theme = $item->theme;

            // $Pseudo = $item->Pseudo;
            // if ($item->Pseudo === "") {
            //     $Pseudo = $item->Prenom;
            // }

            $id = $item->id;

?>
        <?php endforeach ?>
<?php } catch (PDOException $e) {
        echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
    }
}

// echo '<pre>';
// var_dump($tableau);
// echo '</pre>';
?>