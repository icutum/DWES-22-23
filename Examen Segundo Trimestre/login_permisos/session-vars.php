<?php

const USUARIO_POR_DEFECTO = "Anónimo";

session_start();

$user = isset($_SESSION["user"])
    ? $_SESSION["user"]
    : USUARIO_POR_DEFECTO;