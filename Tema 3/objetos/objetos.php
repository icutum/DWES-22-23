<?php
    // Require
    require("./clases/Circulo.php");
    require("./clases/CuentaBancaria.php");

    // Ejercicio 1
    $circulo = new Circulo();
    $circulo->setRadio(2);

    // Ejercicio 2
    $milloneti = new CuentaBancaria("Milloneti", 1000000);
    $agapito = new CuentaBancaria("Agapito", 30345);
    $pobreton = new CuentaBancaria("Pobretón", -10000);

        // Milloneti - Retirar 100 veces 1000€
        for ($i = 0; $i < 100; $i++) { 
            $milloneti->retirarDinero(1000);
        }

        // Agapito - Ingreso de 1200€
        $agapito->ingresarDinero(1200);

        // Todos - Mostrar salario
        $m = $milloneti->mostrarSaldo();
        $a = $agapito->mostrarSaldo();
        $p = $pobreton->mostrarSaldo();

        // Pobretón - Fusionar cuenta con Milloneti
        $pobreton->unir($milloneti);

        // Agapito - Transferir mitad de su salario a Milloneti
        $agapito->transferir($milloneti, $agapito->mostrarSaldo() / 2);

        // Todos - Mostrar toda la información
        /**
         * En el HTML
         */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetos</title>
</head>
<body>
    <h2>Clase círculo</h2>
    <p>El radio del círculo es: <?= $circulo->getRadio(); ?></p>
    <p>El área del círculo es: <?= $circulo->getArea(); ?></p>

    <h2>Cuenta bancaria</h2>
    <h3>Mostrar salario</h3>
    <p><?= $m ?></p>
    <p><?= $a ?></p>
    <p><?= $p ?></p>

    <h3>Mostrar información general</h3>
    <p><?= $milloneti->mostrar(); ?></p>
    <p><?= $agapito->mostrar(); ?></p>
    <p><?= $pobreton->mostrar(); ?></p>
</body>
</html>