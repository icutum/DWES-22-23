<?php
    $token = $_COOKIE["recuerdame"];

    if (isset($token) && $db->validarToken($token)) {
        $_SESSION["id"] = $db->obtenerId($token);
        $_SESSION["nombre"] = $db->obtenerNombre($_SESSION["id"]);

        $db->ejecuta(
            "UPDATE tokens 
                SET expiracion = (NOW() + INTERVAL 7 DAY) 
                WHERE valor = ?
                AND id_usuario = ?",

            $token, $_SESSION["id"]
        );

        setcookie("recuerdame", $token, [
            "expires" => time() + ($_ENV["TOKEN_EXPIRACY"] * 24 * 60 * 60),
            "httponly" => true
        ]);
    }
?>