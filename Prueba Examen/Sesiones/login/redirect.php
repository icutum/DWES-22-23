<?php
    session_start();

    $redirect = "." . $_SERVER["REQUEST_URI"];

    if (!isset($_SESSION["mail"])) {
        header("Location: login.php?url=$redirect&error=Inicia sesión para acceder");
        exit;
    }
?>