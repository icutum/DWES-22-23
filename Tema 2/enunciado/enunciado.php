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
                <td class="precio"><?= $precioProducto ?>€</td>
                <td><input type="number" name ="<?= $nombreProducto ?>" value="<?= empty($_GET) ? 0 : $_GET[$nombreProducto] ?>" min="0" max="99"></td>
            </tr>
        <?php next($productos); } ?>
    </table>
    <input type="submit" value="Generar factura">
<?php reset($productos); }
    function generarFactura($productos) {
        $precioTotalGeneral = array();

        $productosCompra = array();
        foreach ($_GET as $producto => $cantidad) {
            if ($cantidad != 0) {
                $productosCompra[$producto] = $_GET[$producto];
            }
        }
        if (!empty($productosCompra)) {
?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio total</th>
            </tr>
            <?php for ($i = 0; $i < sizeof($productosCompra); $i++) {
                $nombre = key($productosCompra);
                $cantidad = $productosCompra[key($productosCompra)];
                $precioUnitario = $productos[key($productosCompra)];
                $precioTotal = $precioUnitario * $cantidad;

                array_push($precioTotalGeneral, $precioTotal);

                if (!empty($productosCompra[$nombre])) { ?>
                <tr>
                    <td><?= ucfirst($nombre) ?></td>
                    <td class="precio"><?= $cantidad ?></td>
                    <td class="precio"><?= $precioUnitario ?></td>
                    <td class="precio"><?= $precioTotal ?></td>
                </tr>
                <?php } next($productosCompra); ?>
            <?php } ?>
            <tr>
                <th colspan="3" class="precio">TOTAL</th>
                <th class="precio"><?= array_sum($precioTotalGeneral) ?></th>
            </tr>
        </table>
    <?php } ?>
<?php } ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIsta de la compra</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <form action="enunciado.php" method="get">
        <?php imprimirLista($productos); ?>
        <?php generarFactura($productos); ?>
    </form>
</body>
</html>