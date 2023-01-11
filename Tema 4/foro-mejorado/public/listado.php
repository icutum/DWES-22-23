<?php
    require_once("../src/init.php");

    $db->ejecuta("SELECT * FROM usuarios");
    $data = $db->obtenDatos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1>Buenas shurs</h1>
    <p>Nombres:</p>
    <?php foreach ($data as $d) : ?>
        <p><?= $d['nombre'] ?></p>
    <?php endforeach ?>
</body>
</html>