<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaireannonce.css" />
    <link rel="stylesheet" href="../layouts/header.css">
    <link rel="stylesheet" href="../layouts/footer.css">
    <title>Poster une annonce</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>

    <!-- pour le titre logo -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    </style>

</head>


<body>
    <div id="logo">
        <a href="../Site/site.php">Join and Enjoy</a>
    </div>

    <div id="contenu">
        <form action="../Site/trtAnnonces.php" method="post" enctype="application/x-www-form-urlencoded">
            <h1>Poster une annonce : </h1>

            <table>
                <tr>
                    <td>Le titre :</td>
                    <td> <input type="text" placeholder="Entrer un titre" maxlength="100" name="titre" size="20" /></td>
                </tr>
                <tr>
                    <td>La ville : </td>
                    <td> <input type="text" placeholder="Entrer une ville" maxlength="50" pattern="^[[:alpha:]]([-' ]?[[:alpha:]])*$" name="ville" size="20" /></td>
                </tr>
                <tr>
                    <td>Le lieu : </td>
                    <td> <input type="text" placeholder="Entrer un lieu" maxlength="50" name="lieu" size="20" /></td>
                </tr>
                <tr>
                    <td><label><b>Date : </b></label></td>
                    <td> <input type="date" name="date" size="20"></td>
                </tr>
                <tr>
                    <td><label>Heure début / Heure fin :</label></td>
                    <td>
                        <input type="time" id="hdebut" name="hdebut" value="09:00">
                        <input type="time" id="hfin" name="hfin" value="20:00">
                    </td>
                </tr>
                <tr>
                    <td>Thème :</td>
                    <td>
                        <select name="theme1">
                            <option value="autres" checked="checked"></option>
                            <option value="musique">Musique</option>
                            <option value="cinema">Cinéma</option>
                            <option value="sport">Sport</option>
                            <option value="travail">Travail</option>
                            <option value="alimentation">Alimentation</option>
                            <option value="culture">Culture</option>
                            <option value="bar">Bar</option>
                            <option value="festival">Festival</option>
                            <option value="loisir">Loisir</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Thème 2 :</td>
                    <td>
                        <select name="theme2">
                            <option value="not"> </option>
                            <option value="autres">Autres</option>
                            <option value="musique">Musique</option>
                            <option value="cinema">Cinéma</option>
                            <option value="sport">Sport</option>
                            <option value="travail">Travail</option>
                            <option value="alimentation">Alimentation</option>
                            <option value="culture">Culture</option>
                            <option value="bar">Bar</option>
                            <option value="festival">Festival</option>
                            <option value="loisir">Loisir</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Thème 3 :</td>
                    <td>
                        <select name="theme3">
                            <option value="not"></option>
                            <option value="autres">Autres</option>
                            <option value="musique">Musique</option>
                            <option value="cinema">Cinéma</option>
                            <option value="sport">Sport</option>
                            <option value="travail">Travail</option>
                            <option value="alimentation">Alimentation</option>
                            <option value="culture">Culture</option>
                            <option value="bar">Bar</option>
                            <option value="festival">Festival</option>
                            <option value="loisir">Loisir</option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Informations supplémentaires :</td>
                    <td><textarea name="infosup" rows="" placeholder="Des infos supplémentaires ? " cols="50" style="resize: none;"></textarea></td>
                </tr>
                <tr>
                    <div class="btn">
                        <td><input type="reset" value=" Effacer ">
                        <td><input type="submit" value=" Envoyer "></td>
                    </div>
            </table>
        </form>
    </div>
</body>

</html>