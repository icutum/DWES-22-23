<?php
    $palabra = "Holitas";

    // Ejercicio 2
    function imprimirLetrasFor($str) {
        for ($i = 0; $i < strlen($str); $i++) { ?> 
            <h4><?= $str[$i] ?></h4>
        <?php }
    }

    // Ejercicio 3
    function imprimirLetrasWhile($str) {
        $i = 0;
        while ($i != strlen($str) && strtolower($str[$i]) != strtolower("a")) { ?>
            <h4><?= $str[$i] ?></h4>
        <?php $i++; }
    }

    // Ejercicio 4
    function imprimirNumeros() {
        $numeroProhibido = 17;
        $random = mt_rand(1, 100);
        $contador = 0;

        do {
            $random = mt_rand(1, 100);
            $contador = 0;

            for ($i = 0; $i < $random; $i++) { 
                if ($i > 1 && $random % $i == 0) $contador++;
            }
            if ($contador != 2 || $random != $numeroProhibido) {
                ?><span><?= $random . " " ?></span><?php
            }

        } while ($random != $numeroProhibido || $contador == 2);
    }

    //Ejercicio 5
    function imprimirTabla($array) { 
        if (sizeof($_GET) != 0) : ?>
            <table border="1">
                <tr>
                    <th>Clave</th>
                    <th>Valor</th>
                </tr>
            
                <?php foreach ($array as $clave => $valor) { ?>
                    <tr>
                        <td><?= $clave ?></td>
                        <td><?= $valor ?></td>
                    </tr>
                <?php }
            ?></table>
        <?php else : ?>
            <p>Introduce claves y valores a la ruta del archivo <b>(ej: ?valor=estoy&act=recorriendo&un=array)</b></p>
        <?php endif;
    }
    print_r($_GET);

    // Extra
    function imprimirLetrasRecursivo($str) {
        if (strlen($str) == 1) : ?>
            <h4><?= $str ?></h4>
        <?php else: ?>
            <h4><?= substr($str, 0, 1) ?></h4>
            <?php return imprimirLetrasRecursivo(substr($str, 1, strlen($str)));
        endif; ?>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles</title>
</head>
<body>
    <h2>Imprimir letras Bucle For</h2>
    <?= imprimirLetrasFor($palabra) ?>

    <h2>Imprimir letras Bucle While y al encontrar una "a/A" termina</h2>
    <?= imprimirLetrasWhile($palabra) ?>
    
    <h2>Imprimir números hasta que sean primos o 17</h2>
    <?= imprimirNumeros() ?>

    <h2>Imprimir tabla con valores de la ruta</h2>
    <?= imprimirTabla($_GET) ?>

    <h2>Extra: Imprimir letras Recursivo</h2>
    <?= imprimirLetrasRecursivo($palabra) ?>
</body>
</html>