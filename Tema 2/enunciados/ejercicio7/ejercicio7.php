<?php
    $tareas = [
        "limpiar",
        "cocinar",
        "pasear",
        "descansar",
        "comprar",
        "fregar",
        "cobrar",
        "recoger"
    ];

    $personas = [
        "mario",
        "jason",
        "daniel"
    ];

    foreach ($tareas as $tarea) {
        $lista[$tarea] = array_rand(array_flip($personas), 1);
    }
    print_r($lista);

    ?> <br><br> <?php

    // Organigrama
    $dias = ["lunes", "martes", "miercoles", "jueves", "viernes"];
    $organigrama = array_flip($dias);

    foreach ($organigrama as &$dia) {
        $dia = array_flip($tareas);

        foreach ($dia as &$persona) {
            $persona = array_rand(array_flip($personas));
        }
    }
    print_r($organigrama);

    function imprimirOrganigrama($array) { ?>
        <table border="1">
            <tr>
                <td><!-- Espacio en blanco --></td>
                <?php for ($i = 0; $i < sizeof($array); $i++) : ?>
                    <td><?= ucfirst(key($array)); next($array) ?></td>
                <?php endfor; reset($array) ?>
            </tr>

            <?php $tarea = &$array[key($array)]; ?>
            <?php for ($i = 0; $i < sizeof($tarea); $i++) : ?>
                <tr>
                    <td><?= ucfirst(key($tarea)); next($tarea) ?></td>

                    <?php $persona = &$array ?>
                    <?php foreach ($persona as &$minion) : ?>
                        <td><?= $minion[key($minion)]; ?></td>
                    <?php endforeach; reset($persona) ?>
                </tr>
            <?php endfor; reset($tarea) ?>
        </table>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 7</title>
</head>
<body>
    <?= imprimirOrganigrama($organigrama); ?>
</body>
</html>