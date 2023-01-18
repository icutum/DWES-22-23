<?php
    require_once("../src/init.php");

    session_destroy();

    setcookie("recuerdame", null);

    header("Location: listado.php");
?>