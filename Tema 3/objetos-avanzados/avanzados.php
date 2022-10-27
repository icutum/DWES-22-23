<?php
    // Require
        // Patrón Singleton
        require("./clases/Config.php");

        // Interfaces
        require("./interfaces/PlataformaPago.php");
        require("./clases/BancoMalvado.php");
        require("./clases/BitcoinConan.php");
        require("./clases/BancoMaloMalisimo.php");

    // Singleton
        $config = Config::crearInstancia();
        $config->setNombre("Jason");
        $config2 = Config::crearInstancia();
        $config2->setNombre("Mario");
        echo $config->getNombre();
        echo $config2->getNombre();

    // Interfaces
        $bancoMalvado = new BancoMalvado();
        $bancoBitcoin = new BitcoinConan();
        $bancoMaloMalisimo = new BancoMaloMalisimo();

        $bancos = [$bancoMalvado, $bancoBitcoin, $bancoMaloMalisimo];
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
    <h3>Banco Malvado</h3>
    <?= $bancoMalvado->establecerConexion(); ?>
    <?= $bancoMalvado->compruebaSeguridad(); ?>
    <?= $bancoMalvado->pagar("Mario", 800); ?>

    <h3>Pagos aleatorios</h3>
    <?php
        for($i = 0; $i < sizeof($bancos); $i++) { ?>
            <p><?= $bancos[rand(0, sizeof($bancos) - 1)]->pagar("Mario", 800); ?></p>
        <?php }
    ?>
</body>
</html>