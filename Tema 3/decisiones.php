<?php
    // Ejercicio 1
    $rand1 = mt_rand(1, 100);
    $rand2 = mt_rand(1, 100);
    $rand3 = mt_rand(1, 100);

    function ordenar($n1, $n2, $n3) {
        $mayor = 0;
        $medio = 0;
        $menor = 0;

        if ($n1 > $n2 && $n1 > $n3) {
            $mayor = $n1;

            if ($n2 > $n3) {
                $medio = $n2;
                $menor = $n3;
            } else {
                $medio = $n3;
                $menor = $n2;
            }
        } elseif ($n2 > $n1 && $n2 > $n3) {
            $mayor = $n2;

            if ($n1 > $n3) {
                $medio = $n1;
                $menor = $n3;
            } else {
                $medio = $n3;
                $menor = $n1;
            }
        } else {
            $mayor = $n3;

            if ($n1 > $n2) {
                $medio = $n1;
                $menor = $n2;
            } else {
                $medio = $n2;
                $menor = $n1;
            }
        } ?>

        <h1><?= $mayor ?></h1>
        <h2><?= $medio ?></h2>
        <h3><?= $menor ?></h3>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decisiones</title>
</head>
<body>
    <?= ordenar($rand1, $rand2, $rand3) ?>
</body>
</html>