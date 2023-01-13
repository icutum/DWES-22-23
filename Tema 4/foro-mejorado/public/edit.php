<?php
    require("../src/init");

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: login.php?redirect=edit.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil | <?= $title ?></title>
</head>
<body>
    <h1>Hola shur, aquí puedes editar tu perfil</h1>
</body>
</html>