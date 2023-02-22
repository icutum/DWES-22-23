<?php
    require_once("../src/init.php");

    $db->ejecuta(
        "DELETE FROM tokens
            WHERE id_usuario = ?
            AND valor = ?",

        $_SESSION["id"], $_COOKIE["recuerdame"]
    );

    setcookie("recuerdame", null);

    session_destroy();

    header("Location: listado.php");
?>