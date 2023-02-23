<?php
    require_once("./session-vars.php");

    session_destroy();

    $redirection = $_GET["url"];

    header("Location: $redirection");
?>