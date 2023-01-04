<?php
    session_start();

    if (!isset($_SESSION["userID"])) {
        $url = $_SERVER["REQUEST_URI"];

        header("Location: login.php?redirect=$url");

        exit();
    }
?>