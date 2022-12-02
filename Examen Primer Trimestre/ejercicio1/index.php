<?php
    // - Apartado Devuelven cadenas
    function pintaCabecera(...$cadenas) { ?>
        <tr>
            <?php foreach ($cadenas as $cadena) { ?>
                <th><?= $cadena ?></th>
            <?php } ?>
        </tr>
    <?php }

    function pintaContenido(...$cadenas) { ?>
        <tr>
            <?php foreach ($cadenas as $cadena) { ?>
                <td><?= $cadena ?></td>
            <?php } ?>
        </tr>
    <?php }

    const HORA_INICIO = 9;
    const HORA_FIN = 22;

    function pintaHorarioVacio($horaInicio, $horaFin) {
        $horas = []; ?>

        <table>
            <?= pintaCabecera("Hora", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes") ?>

            <?php if ($horaInicio < $horaFin) :
                for ($i = $horaInicio; $i < $horaFin; $i++) :
                    $horas[$i] = $i;
                endfor;
            endif;

            array_walk($horas, function($hora) {
                pintaContenido(sprintf("%d:00", $hora), "", "", "", "", "");
            }); ?>
        </table>
    <?php }

    // - Apartado Pintan HTML
    const HORARIO = [
        "Lunes" => "Cocinar",
        "Martes" => "Limpiar",
        "Miercoles" => "Aprobar DWES",
        "Jueves" => "Comprar",
        "Viernes" => "Descansar",
    ];

    function pintaHorizontal($array) { ?>
        <table>
            <tr>
                <?php foreach (array_keys($array) as $clave) : ?>
                    <th><?= $clave ?></th>
                <?php endforeach; ?>
            </tr>
            <tr>
                <?php foreach ($array as $valor) : ?>
                    <td><?= $valor ?></td>
                <?php endforeach; ?>
            </tr>
        </table>
    <?php }

function pintaVertical($array) { ?>
    <table>
        <?php foreach ($array as $clave => $valor) : ?>
            <tr>
                <th><?= $clave ?></th>
                <td><?= $valor ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 25px 0;
        }

        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Devuelven cadenas</h2>
    <?= pintaHorarioVacio(HORA_INICIO, HORA_FIN) ?>

    <h2>Pintan HTML</h2>
    <?= pintaHorizontal(HORARIO) ?>
    <?= pintaVertical(HORARIO) ?>
</body>
</html>