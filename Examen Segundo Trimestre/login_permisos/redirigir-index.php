<?php

require_once("./init.php");

if (isset($_SESSION["user"])) {
    header("Location: " . REDIRIGIR_POR_DEFECTO);
    die();
}