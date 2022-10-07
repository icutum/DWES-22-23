<?php
    $tareas = [
        "limpiar",
        "cocinar",
        "pasear",
        "descansar",
        "comprar",
        "fregar",
        "cobrar",
        "recoger"
    ];

    $personas = [
        "mario",
        "jason",
        "daniel"
    ];

    foreach ($tareas as $tarea) {
        $lista[$tarea] = array_rand(array_flip($personas), 1);
    }

    print_r($lista);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 7</title>
</head>
<body>
    
</body>
</html>