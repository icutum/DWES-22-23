<?php
    require("./Controller/Board.php");

    use Controller\Board as Board;

    $board = new Board(5, 5);
    $board->placeWord("Mario");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sopa de Letras</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 25px;
            height: 25px;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <?= $board->printBoard(); ?>
</body>
</html>