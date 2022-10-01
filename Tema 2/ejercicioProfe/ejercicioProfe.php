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

    $resultado = array_map(function($array) {
        return ($array[1] ? "Señor " : "Señora ") . $array[0];
    }, $personas);

    /**
     * Ejercicio 2
     */
    $comida = [
        ["Banana", 3, 56],
        ["Chuleta", 1, 256],
        ["Pan", 1, 90]
    ];

    $totalCalorias = array_reduce($comida, function($total, $calorias) {
        return $total += $calorias[1] * $calorias[2];
    });

    /**
     * Ejercicio 3
     */
    $listadoHombres = array_filter($personas, function($array) {
        return $array[1];
    });

    $listadoMujeres = array_filter($personas, function($array) {
        return !$array[1];
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
    <p><?= print_r($resultado) ?></p>
    <p>El total de calorías es: <?= $totalCalorias ?></p>
    <p>Los hombres son: <?= print_r($listadoHombres) ?></p>
    <p>Las mujeres son: <?= print_r($listadoMujeres) ?></p>
</body>
</html>