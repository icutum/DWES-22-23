<?php
    require_once("../src/init");

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: login.php?redirect=edit.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title>Editar perfil | <?= $title ?></title>
</head>
<body>
    <h1>Hola shur, aquí puedes editar tu perfil</h1>
</body>
</html>