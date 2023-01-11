<?php
    require_once("config.php");
    require_once("DWESBaseDatos.php");

    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        $CONFIG['db_host'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );

    $title = $CONFIG['title'];
?>