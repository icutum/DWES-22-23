<?php
    $numeros = [];
    for ($i = 0; $i < 20; $i++) { 
        array_push($numeros, $i + 1);
    }

    $pares = array_filter($numeros, function($n) {
        return $n % 2 == 0 ? $n : "";
    });

    $impares = array_filter($numeros, function($n) {
        return $n % 2 != 0 ? $n : "";
    });

    print_r($pares);
    ?> <br><br> <?php
    print_r($impares);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 10</title>
</head>
<body>
    
</body>
</html>