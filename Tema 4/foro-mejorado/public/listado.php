<?php
    require_once("../src/init.php");

    $db->ejecuta("SELECT * FROM usuarios");
    $data = $db->obtenDatos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title><?= $title ?></title>
</head>
<body>
    <?php require_once("../src/nav.php"); ?>
    <h1 class="bg-primary-subtle">Buenas shurs</h1>
    <p>Nombres:</p>
    <?php foreach ($data as $d) : ?>
        <p><?= $d['nombre'] ?></p>
    <?php endforeach ?>
</body>
</html>