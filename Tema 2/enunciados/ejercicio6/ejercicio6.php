<?php
    $numeros = [];

    for ($i = 0; $i < 20; $i++) {
        array_push($numeros, rand(0, 9));
    }
    print_r($numeros);

    ?> <br> <?php

    sort($numeros);
    print_r($numeros);

    ?> <br> <?php

    $final = array_slice($numeros, 0, 10);
    $inicio = array_slice($numeros, 10, 10);
    print_r($final);

    ?> <br> <?php

    print_r($inicio);

    ?> <br> <?php

    foreach ($final as $valor) {
        array_push($inicio, $valor);
    }

    print_r($inicio);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 6</title>
</head>
<body>
    
</body>
</html>