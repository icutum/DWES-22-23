<?php
    /**
     * También se puede utilizar array_walk_recursive
     * En este caso en concreto, pienso que es mejor
     * hacerlo así ya que con array_walk_recursive
     * muestra el 0/1 de cada persona en el ejercicio 3
     */

    function mostrarArray($array) {
        array_walk($array, function($valor) {
            if (is_array($valor)) { ?>
                <p><?= $valor[0] ?></p>
            <?php } else { ?>
                <p><?= $valor ?></p>
            <?php }
            }
        );
    }

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
    <title>Ejercicios Jorge</title>
</head>
<body>
    <h2>Formalidad</h2>
    <?= mostrarArray($resultado) ?>
    <h2>El total de calorías es:</h2>
    <?= $totalCalorias ?>
    <h2>Los hombres son:</h2>
    <?= mostrarArray($listadoHombres) ?>
    <h2>Las mujeres son:</h2>
    <?= mostrarArray($listadoMujeres) ?>
</body>
</html>