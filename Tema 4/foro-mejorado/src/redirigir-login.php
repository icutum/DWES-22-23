<?php
    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: login.php?redireccion=" . $_SERVER["REQUEST_URI"]);
        die();
    }
?>