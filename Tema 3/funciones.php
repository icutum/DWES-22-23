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

    // Ejercicio 9
    $a = 5;
    $b = 20;

    function intercambiarValores(mixed &$valor1, mixed &$valor2) {
        $aux = $valor1;
        $valor1 = $valor2;
        $valor2 = $aux;
    }

    // Ejercicio 10;
    function aleatorio(int $nValores = 10, int $valorMaximo = 10, int $valorMinimo = 0): array {
        $array = [];

        for ($i = 0; $i < $nValores; $i++) { 
            $array[$i] = mt_rand($valorMinimo, $valorMaximo);
        }

        return $array;
    }

    $arrayAleatorio1 = aleatorio();
    $arrayAleatorio2 = aleatorio(5);
    $arrayAleatorio3 = aleatorio(5, 50);
    $arrayAleatorio4 = aleatorio(5, 50, -50);
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

    <h2>Intercambiar valores</h2>
    <p>El valor de "a" antes: <?= $a ?></p>
    <p>El valor de "b" antes: <?= $b ?></p>
    <?= intercambiarValores($a, $b) ?>
    <hr>
    <p>El valor de "a" después: <?= $a ?></p>
    <p>El valor de "b" después: <?= $b ?></p>

    <h2>Array aleatorio con parámetros opcionales</h2>
    <p><?= print_r($arrayAleatorio1) ?></p>
    <p><?= print_r($arrayAleatorio2) ?></p>
    <p><?= print_r($arrayAleatorio3) ?></p>
    <p><?= print_r($arrayAleatorio4) ?></p>
</body>
</html>