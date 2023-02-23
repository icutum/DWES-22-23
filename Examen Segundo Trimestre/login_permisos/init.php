<?php

require_once('./session-vars.php');
require_once("./DWESBaseDatos.php");

const DB_HOST = "examen";
const DB_USUARIO = "examen";
const DB_CONTRA = "examen";

const REDIRIGIR_POR_DEFECTO = "index.php";

$db = DWESBaseDatos::obtenerInstancia();
$db->inicializa(
    DB_HOST,
    DB_USUARIO,
    DB_CONTRA
);