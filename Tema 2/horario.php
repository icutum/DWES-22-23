<?php
    // Probar con más clave-valor anidados

    $horario = [
        "lunes" => ["DWEC", "DWEC", "DWEC", "EIE", "EIE", "ITGS"],
        "martes" => ["ITGS", "DAW", "DAW", "DIW", "DIW", "DIW"],
        "miercoles" => ["DIW", "DIW", "DIW", "DWES", "DWES", "DWES"],
        "jueves" => ["EIE", "DAW", "DAW", "DWES", "DWES", "DWES"],
        "viernes" => ["DWES", "DWES", "DWES", "DWEC", "DWEC", "DWEC"]
    ];

    function mostrarHorario($h) {
        for ($i = 0; $i < count($h); $i++) { 
            echo "<tr><td>" . key($h) . "</td>";

            foreach($h[key($h)] as $modulo) echo "<td>" . $modulo . "</td>";

            echo "</tr>";
            next($h);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario DAW2V</title>
</head>
<body>
    <table border="1">
        <?php mostrarHorario($horario) ?>
    </table>
</body>
</html>