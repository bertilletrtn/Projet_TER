<?php
require ("connextionpdo.php");
require_once ("js.php");

try {
    $objdb = connexpdo("Projet.sql");
} catch (PDOException $e) {
    displayException($e);
}
?>