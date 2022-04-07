<?php
require("js.php");
function connexpdo(string $db)
{/*
    $sgbd = "mysql"; // choix de MySQL (fonctionnera aussi avec MariaDB !)
    $host = "localhost";
    //$port = 3306; // port par défaut de MySQL (à adapter selon votre config et votre choix entre mysql/mariadb)
    $charset = "UTF8";
    $user = "root"; // user id
    $pass = ""; // password
    try {
        $pdo = new pdo("$sgbd:host=$host;dbname=$db;$charset=$charset", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        displayException($e);
        exit();
    }*/
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'Projet';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
}

?>