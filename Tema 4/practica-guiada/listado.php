<?php
    $datos = file_get_contents("temazos.csv");
    $datos = explode(";", $datos);
    array_pop($datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Canción</th>
            <th>Hora</th>
        </tr>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <?php foreach (explode(",", $dato) as $info) : ?>
                    <td><?= $info ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>