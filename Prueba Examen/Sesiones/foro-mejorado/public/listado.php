<?php
    require_once("../src/init.php");

    $db->ejecuta("SELECT * FROM usuarios");
    $usuario = $db->obtenDatos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title><?= $title ?></title>
</head>
<body>
    <?php require_once("../src/nav.php"); ?>
    <div class="container mt-5 w-50">
        <h2 class="mb-3">Listado de shurs</h2>

        <ul>
            <?php foreach ($usuario as $u) : ?>
                <li class="container">
                    <?= $u['nombre'] ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>