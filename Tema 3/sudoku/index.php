<?php
    set_time_limit(0);

    // Require
        spl_autoload_register(function($clase) {
            $ruta = "./";
            $archivo = str_replace('\\', '/', $clase);
            require("$ruta${archivo}.php");
        });

    // Instaciación de la clase
        $sudoku = Clases\Sudoku::crearInstancia();
        // $sudoku->setTablero();
        $sudoku->eliminarPosiciones();
        $sudoku->getTablero();
        print_r(Clases\Sudoku::$tablero);
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
            --ff-body: Arial;

            --clr-black: #111;
            --clr-gray: #bbb;
            --clr-white: #efefef;

            --thin: solid 1px var(--clr-black);
            --bold: solid 5px var(--clr-black);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font: inherit;
            background: inherit;
        }

        body {
            height: 100vh;
            display: grid;
            place-items: center;
            font-family: var(--ff-body);
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
            background-color: var(--clr-gray);
            font-weight: bold;
        }

        .sudoku__column--bold {
            border-left: var(--bold);
        }

        .sudoku__select {
            width: 50px;
            height: 50px;
            text-align: center;
            appearance: none;
            border-radius: none;
            background-color: var(--clr-white);
            font-weight: normal;
        }

        .sudoku__select-option {
            display: grid;
        }
    </style>
</head>
<body>
    
</body>
</html>