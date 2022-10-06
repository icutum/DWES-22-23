<?php
    $usuarios = [
        "jorge" => "1234",
        "amparo" => "admin",
        "mary" => ""
    ];

    array_walk($usuarios, function($valor, $clave) { ?>
        <p><?= "Usuario: $clave | Contraseña: $valor" ?></p>
    <?php });

    $cifrado = array_map(function($array) {
        if ($array != "")
            return password_hash($array, PASSWORD_DEFAULT);
        else
            return "tmp2022";
    }, $usuarios);
    print_r($cifrado);

    ?> <br> <?php
    
    $usuarios2 = array_map(function($array1, $array2) {
        if (!password_verify($array1, $array2)) return $array2;
        else return $array1;
    }, $usuarios, $cifrado);

    $usuarios = array_combine(array_keys($usuarios), $usuarios2);
    print_r($usuarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 3</title>
</head>
<body>
    
</body>
</html>