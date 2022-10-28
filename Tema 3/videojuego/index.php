<?php
    // Require
        ?> <h2>Require</h2> <?php
        spl_autoload_register(function($clase) {
            $ruta = "./";
            $archivo = str_replace('\\', '/', $clase);
            echo "$ruta${archivo}.php" . "<br>";
            require("$ruta${archivo}.php");
        });
        
    // Creación de objetos
        $humano = new Clases\Humano();
        $magoBlanco = new Clases\MagoBlanco();
        $magoOscuro = new Clases\MagoOscuro();
        $edificio = new Clases\Edificio();
        $edificio = new Clases\Objeto();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuego</title>
</head>
<body>
    <h2>Humano</h2>
    <p><?= $humano->atacar(); ?></p> 
    <p><?= $humano->defender(); ?></p>

    <h2>Mago Blanco</h2>
    <p><?= $magoBlanco->atacar(); ?></p> 
    <p><?= $magoBlanco->defender(); ?></p>

    <h2>Mago Oscuro</h2>
    <p><?= $magoOscuro->atacar(); ?></p> 
    <p><?= $magoOscuro->defender(); ?></p>

    <h2></h2>
</body>
</html>