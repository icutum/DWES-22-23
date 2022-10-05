<?php
    /**
     * Números idénticos entre ambos:
     * 2, 8
     */
    $num1 = [1, 6, 7, 2, 8];
    $num2 = [2, 4, 8, 9, 0];

    $num3 = array_intersect($num1, $num2);
    print_r($num3);

    echo "<br>";

    $num4 = array_diff(array_merge($num1, $num2), $num3);
    print_r($num4);

    echo "<br>" . array_search(7, $num1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 2</title>
</head>
<body>
    
</body>
</html>