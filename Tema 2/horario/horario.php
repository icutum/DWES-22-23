<?php
    $horario = [
        "Lunes" => ["DWEC", "DWEC", "DWEC", "EIE", "EIE", "ITGS"],
        "Martes" => ["ITGS", "DAW", "DAW", "DIW", "DIW", "DIW"],
        "Miercoles" => ["DIW", "DIW", "DIW", "DWES", "DWES", "DWES"],
        "Jueves" => ["EIE", "DAW", "DAW", "DWES", "DWES", "DWES"],
        "Viernes" => ["DWES", "DWES", "DWES", "DWEC", "DWEC", "DWEC"]
    ];

    function mostrarHorario($h) {
?>
        <table>
        <caption>Horario de DAW2V</caption>

        <?php
        for ($i = 0; $i < count($h); $i++) {
            $diaSemana = key($h); // Cogemos la clave del array
        ?>
            <tr>
                <th><?= $diaSemana ?></th>
        <?php            
            $numModulos = count($h[key($h)]);
            for ($j = 0; $j < $numModulos; $j++) {
                if ($j == $numModulos / 2) {
        ?>
                    <td>Recreo</td>
            <?php }
                $modulo = $h[key($h)][$j]; // Pillamos cada módulo 
            ?>    
                <td class="<?= $modulo ?>"><?= $modulo ?></td>
            <?php } ?>

            </tr>
            <?php next($h); // Avanza el puntero a la clave del siguiente día ?>
        <?php } ?>
        </table>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario DAW2V</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php mostrarHorario($horario) ?>
</body>
</html>