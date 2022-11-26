<?php
    require("./Utils/Autoload.php");

    $hola = new Input\InputText("no", "no");
    echo $hola->getType();
    echo $hola->getValue();
    echo $hola->getName();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    
</body>
</html>