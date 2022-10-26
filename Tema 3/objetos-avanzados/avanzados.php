<?php
    // Require
        // Patrón Singleton
        require("./clases/Config.php");

        // Interfaces
        require("./interfaces/PlataformaPago.php");
        require("./clases/BancoMalvado.php");

    // Singleton
        $config = Config::crearInstancia("Jason");
        $config->setNombre("Mario");
        echo $config->getNombre();

    // Interfaces
        $banco = new BancoMalvado();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetos Avanzados</title>
</head>
<body>
    <h2>Interfaces</h2>
    <?= $banco->establecerConexion(); ?>
    <?= $banco->compruebaSeguridad(); ?>
    <?= $banco->pagar("Mario", 800); ?>
</body>
</html>