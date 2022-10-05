<?php
    $usuarios = [
        "jorge" => "1234",
        "amparo" => "admin",
        "mary" => ""
    ];

    array_walk($usuarios, function($valor, $clave) { ?>
        <p><?= "Usuario: $clave | Contraseña: $valor" ?></p>
    <?php });
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enunciado 3</title>
</head>
<body>
    
</body>
</html>