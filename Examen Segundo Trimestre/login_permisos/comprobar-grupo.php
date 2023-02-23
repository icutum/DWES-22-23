<?php

const GRUPO_POR_DEFECTO = "anonimo";
const GRUPO_ADMIN = "admin";
const GRUPO_PROFESIONALES = "profesionales";
const GRUPO_LUSERS = "lusers";

$db->ejecuta("SELECT nombre FROM grupos WHERE id = (SELECT id_grupo FROM usuarios WHERE nombre = ?)", $_SESSION["user"]);
$grupo = $db->obtenElDato();

$nombreGrupo = isset($grupo["nombre"])
    ? $grupo["nombre"]
    : GRUPO_POR_DEFECTO;