<?php
    function ejercicio1() {
        echo "Hola mundo! ";
    }

    function ejercicio2() {
        $saludo = "Hola mundo! ";
        echo $saludo; 
    }

    function ejercicio3() {
        ejercicio2();
        $nombre = "Mario";
        echo "Esta página ha sido programada por " . $nombre;
    }

    function ejercicio4() {
        ejercicio2();
        $nombre = "Mario";
        echo "<i>Esta página ha sido programada por </i><b><i>" . $nombre . "</i></b>";
    }

    function ejercicio5() {
        ejercicio4();

        $nombre = "<b><i>Mario</i></b>";
        $r = 3;
        $pi = M_PI;

        echo "<div class='circulo' style='width: " . $r * 2 . "cm; height: " . $r * 2 . "cm;'></div>";
        echo "<p>Perímetro: " . round(2 * $pi * $r, 2) . "cm</p>";
        echo "<p>Área: " . round($pi * pow($r, 2), 2) . "cm</p>";
    }

    function ejercicio6() {
        $x = 5;
        $y = 2;

        echo $x . " y " . $y . "\n";
        echo $x + $y;
        echo $x - $y;
        echo $x * $y;
        echo $x / $y;
    }

    function ejercicio7($n) {
        for($i = 0; $i < $n; $i++) { 
            for ($j = 0; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br/>";
        }
    }

    function ejercicio8($n) {
        for($i = 0; $i < $n; $i++) { 
            for ($j = 0; $j <= $i; $j++) {
                echo "<span style='background-color: " . hexadecimal() . ";'>* </span>";
            }
            echo "<br/>";
        }
    }

    function hexadecimal() {
        $r = dechex(rand(0, 255));
        $g = dechex(rand(0, 255));
        $b = dechex(rand(0, 255));
        
        return "#" . $r . $g . $b;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <style>
        html {
            counter-reset: ejercicio;
        }

        h2::before {
            content: "Ejercicio " counter(ejercicio);
            counter-increment: ejercicio;
        }

        .circulo {
            position: relative;
            border: 1px solid black;
            border-radius: 100%;
        }

        .circulo::before,
        .circulo::after {
            content: '';
            position: absolute;
        }

        .circulo::before { /* Radio */
            top: 50%;
            right: 0;
            width: 50%;
            height: 1px;
            background-color: red;
        }

        .circulo::after { /* Diámetro */
            top: 0;
            left: 50%;
            width: 1px;
            height: 100%;
            background-color: blue;
        }

        .piramide {
            width: 100%;
            text-align: center;
        }

        .piramide--color {
            animation: rotar 2s linear infinite;
        }

        @keyframes rotar {
            from {
                transform: rotate(<?= rand(0, 360) ?>deg) rotateX(<?= rand(0, 360) ?>deg) rotateY(<?= rand(0, 360) ?>deg);
            }

            to {
                transform: rotate(<?= rand(0, 360) ?>deg) rotateX(<?= rand(0, 360) ?>deg) rotateY(<?= rand(0, 360) ?>deg);
            }
        }
    </style>
</head>
<body>
    <h2><!--1--></h2>
    <p><?= ejercicio1() ?></p>

    <h2><!--2--></h2>
    <p><?= ejercicio2() ?></p>

    <h2><!---3--></h2>
    <p><?= ejercicio3() ?></p>

    <h2><!---4--></h2>
    <p><?= ejercicio4() ?></p>

    <h2><!---5--></h2>
    <p><?= ejercicio5() ?></p>

    <h2><!--6--></h2>
    <p><?= ejercicio6() ?></p>

    <h2><!--7--></h2>
    <div class="piramide"><?= ejercicio7(5) ?></div>

    <h2><!--8--></h2>
    <div class="piramide piramide--color"><?= ejercicio8(35) ?></div>
</body>
</html>