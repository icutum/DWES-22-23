<?php
    require("./Clases/Sudoku.php");
    $su = new Sudoku();
    $su->crearTabla();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku</title>
    <style>
        :root {
            --clr-black: #111;

            --thin: solid 1px var(--clr-black);
            --bold: solid 5px var(--clr-black);
        }

        .sudoku {
            border-collapse: collapse;
            border: var(--bold);
        }

        .sudoku__row--bold {
            border-top: var(--bold);
        }

        .sudoku__column {
            width: 50px;
            height: 50px;
            border: var(--thin);
            text-align: center;
        }

        .sudoku__column--bold {
            border-left: var(--bold);
        }
    </style>
</head>
<body>
    
</body>
</html>