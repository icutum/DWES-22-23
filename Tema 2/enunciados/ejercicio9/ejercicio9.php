<?php
    // explode && in_array
    $parrafo= <<<EOF
        En la década de 1920 Satyendra Nath Bose y Albert Einstein publican conjuntamente un artículo científico acerca de los fotones de luz y sus propiedades Bose describe ciertas reglas para determinar si dos fotones deberían considerarse idénticos o diferentes Esta se llama la condensado de Bose - Einstein Einstein aplica estas reglas a los átomos preguntándose cómo se comportarían los átomos de un gas si se les aplicasen estas reglas
    EOF;

    $parrafo = explode(" ", $parrafo);
    $palabra = "década";
    echo in_array($palabra, $parrafo) ? "Se ha encontrado la palabra $palabra" : "No se ha encontrado la palabra $palabra";

    ?> <br><br> <?php

    // explode && array_unique
    $frase = "Mateo, Marcos, Lucas, Pedro, Max, Philip, Lucer, Robert, Maximiliano, Roberto, Pedro, Wenceslao, Teodoro, Mateo, Felipe, Petra, Lucer, Jose, Armando, Simón, Nicéforo, Jose, Felipe";

    $frase = array_unique(explode(", ", $frase));
    print_r($frase);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 9</title>
</head>
<body>
    
</body>
</html>