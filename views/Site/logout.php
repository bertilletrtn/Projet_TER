<?php
    session_start();
    session_destroy();
    header('Location: ../Connexion/connexion.php');
    exit;
?>