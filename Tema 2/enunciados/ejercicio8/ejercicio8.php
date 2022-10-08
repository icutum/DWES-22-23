<?php
    // array_merge()
    $persona1 = [
        "mario",
        "sanchez",
        "001",
        "mario@mail.com"
    ];

    $persona2 = [
        "jason",
        "londono",
        "002",
        "jason@mail.com"
    ];

    $persona3 = [
        "daniel",
        "casado",
        "003",
        "daniel@mail.com"
    ];

    $persona4 = [
        "jovani",
        "vazquez",
        "004",
        "bendiciones@copacopa.copacopa"
    ];

    $personas = array_merge([$persona1], [$persona2], [$persona3], [$persona4]);
    print_r($personas);

    ?> <br> <?php

    // array_replace_recursive
    $edades = [
        25,
        22,
        24,
        29,
        26,
        23,
        20,
        19,
        26,
        19,
        20,
        23
    ];

    $colores = [
        "rojo",
        "azul",
        "verde",
        "morado"
    ];

    $mayor = [
        "mayor",
        26
    ];

    for ($i = 0; $i < sizeof($edades); $i++) { 
        $edades[$i] < 23 ? $edades[$i] = $colores : $edades[$i];
        $edades[$i] == 26 ? $edades[$i] = $mayor : $edades[$i];
    }
    print_r($edades);

    ?> <br> <?php

    // in_array
    function encontrarValor($array, $valor, $error) {
        echo (in_array($valor, $array) ? "El valor $valor se encuentra en la posición " . array_search($valor, $array) + 1 : $error) . "<br>";
    }

    encontrarValor($edades, 29, "Este valor no existe en el array indicado");
    encontrarValor($edades, 99, "Este valor no existe en el array indicado");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 8</title>
</head>
<body>
    
</body>
</html>