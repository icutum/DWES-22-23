<?php
    /**
     *  Ejercicio 1
     */       
    $personas = [
        ["Jorge", 1],
        ["Bea", 0],
        ["Paco", 1],
        ["Amparo", 0]
    ];

    array_walk($personas, function($valor, $clave) {
        $personas[$clave] = ($valor[1] ? "Señor " : "Señora ") . $valor[0];
        echo $personas[$clave];
    });

    /**
     * Ejercicio 2
     */
    $comida = [
        ["Banana", 3, 56],
        ["Chuleta", 1, 256],
        ["Pan", 1, 90]
    ];

    $totalCalorias = array_reduce($comida, function($total, $calorias) {
        $total += $calorias[1] * $calorias[2];
        return $total;
    });
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?= ($personas) ?></p>
    <p>El total de calorías es: <?= $totalCalorias ?></p>
    <p></p>
</body>
</html>