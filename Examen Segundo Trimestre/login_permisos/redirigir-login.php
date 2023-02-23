<?php

if (!isset($_SESSION["user"]) || $_SESSION["user"] == "") {
    header("Location: login.php?redireccion=" . $_SERVER["REQUEST_URI"]);
    die();
}