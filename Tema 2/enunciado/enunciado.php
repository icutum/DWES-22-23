<?php
    $productos = [
        "naranja" => 1.2,
        "manzana" => 1.5,
        "pera" => 1.8,
        "platano" => 1.1,
        "kiwi" => 2,
        "macarrones" => 0.5,
        "arroz" => 0.75,
        "salchichas" => 1
    ];

    function imprimirLista($productos) {
?>
    <table>
        <caption>Lista de productos</caption>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>
        <?php for ($i = 0; $i < sizeof($productos); $i++) { ?>
            <tr>
                <?php
                    $nombreProducto = key($productos);
                    $precioProducto = $productos[$nombreProducto];
                ?>
                <td><?= ucfirst($nombreProducto) ?></td>
                <td><?= $precioProducto ?>€</td>
                <td><input type="number" name ="<?= $nombreProducto ?>" value="0" min="0" max="99"></td>
            </tr>
        <?php next($productos); } ?>
    </table>
    <input type="submit" value="Generar factura">
<?php }
    if (isset($_GET) && $_GET != null) {
        generarFactura($productos);
    }

    function generarFactura($productos) {
    reset($productos);
    $precioTotalGeneral = 0;
?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Precio total</th>
        </tr>
        <?php for ($i = 0; $i < sizeof($_GET); $i++) { 
            if ($_GET[key($productos)] > 0) { ?>
                <tr>
                    <?php
                        $nombre = key($productos);
                        $cantidad = $_GET[key($productos)];
                        $precioUnitario = $productos[$nombre];
                        $precioTotal = $precioUnitario * $cantidad;
                        $precioTotalGeneral += $precioTotal;
                    ?>
                    <td><?= $nombre ?></td>
                    <td><?= $cantidad ?></td>
                    <td><?= $precioUnitario ?></td>
                    <td><?= $precioTotal ?></td>
                </tr>
            <?php } ?>    
        <?php next($productos); } ?>
        <tr>
            <th colspan="3">TOTAL</th>
            <th><?= $precioTotalGeneral ?></th>
        </tr>
<?php } ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="enunciado.php" method="get">
        <?php imprimirLista($productos); ?>
    </form>
</body>
</html>