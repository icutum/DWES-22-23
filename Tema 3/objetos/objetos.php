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
            $milloneti->retirar(1000);
        }

        // Agapito - Ingreso de 1200€
        $agapito->ingresarDinero(1200);

        // Todos - Mostrar salario
        $milloneti->mostrarSaldo();
        $agapito->mostrarSaldo();
        $pobreton->mostrarSaldo();
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
</body>
</html>