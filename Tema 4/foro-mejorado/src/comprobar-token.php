<?php
    $token = $_COOKIE["recuerdame"];

    if (isset($token) && $db->validarToken($token)) {
        $_SESSION["id"] = $db->obtenerId($token);
        $_SESSION["nombre"] = $db->obtenerNombre($_SESSION["id"]);

        $db->ejecuta(
            "UPDATE tokens 
                SET expiracion = (NOW() + INTERVAL 7 DAY) 
                WHERE token = ?",

            $token
        );
    }
?>