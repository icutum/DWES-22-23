<?php
    require_once("../src/init.php");

    session_destroy();

    header("Location: listado.php");
?>