<?php
    $n = mt_rand(0, 20);
    $m = mt_rand(0, 20);
    $x = mt_rand(0, 20);
    $y = mt_rand(0, 20);
    $z = mt_rand(0, 20);

    // Ejercicio 6
    function sumarNumerosEntre(int $inicio, int $final) {
        $aux = 0;
        $total = 0;

        ?><p>Núm. inicial: <?= $inicio ?></p>
        <p>Núm. final: <?= $final ?></p><?php

        if ($final > $inicio) {
            for ($i = $inicio; $i < $final; $i++) { 
                $total += $i;
            }
        } else {
            for ($i = $final; $i < $inicio; $i++) { 
                $total += $i;
            }
        } ?>

        <p>Total: <b><?= $total ?></b></p>
        <br>
    <?php }

    // Ejercicio 7
    function concatenar(string $separador, string ...$palabras) {
        $frase = "";

        foreach ($palabras as $clave => $palabra) {
            if ($clave == array_key_last($palabras)) {
                $frase .= $palabra;
            } else {
                $frase .= $palabra . $separador;
            }
            
        } ?>

        <p><?= $frase ?></p>
        <br>
    <?php }

    // Ejercicio 8
    function generarArray(mixed ...$parametros) {
        $array = [];

        foreach ($parametros as $parametro) {
            if (!array_key_exists(gettype($parametro), $array)) {
                $array[gettype($parametro)] = 1;
            } else {
                $array[gettype($parametro)]++;
            }
        }

        print_r($array);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <h2>Sumar números entre dos valores</h2>
    <?= sumarNumerosEntre($n, $m) ?>
    <?= sumarNumerosEntre($m, $x) ?>
    <?= sumarNumerosEntre($x, $y) ?>
    <?= sumarNumerosEntre($y, $z) ?>
    <?= sumarNumerosEntre($z, $n) ?>

    <h2>Concatenar palabras</h2>
    <?= concatenar("|", "Hola", "a", "todos") ?>
    <?= concatenar(".", "Israel", "no", "es", "un", "estado", "legitimo") ?>
    <?= concatenar(" ", "En", "un", "puerto", "italianoooooooooooo") ?>

    <h2>Generar array asociativo</h2>
    <?= generarArray(3, "h", 'hola', [1,2,3], [1], "h") ?>
</body>
</html>