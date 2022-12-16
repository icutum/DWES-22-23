<?php
    session_start();

    $bgcolor = isset($_SESSION["background-color"]) ? $_SESSION["background-color"] : "#ffffff";
    $fgcolor = isset($_SESSION["color"]) ? $_SESSION["color"] : "#000000";
    $username = isset($_SESSION["username"]) ? $_SESSION["username"] : "Anónimo";
?>