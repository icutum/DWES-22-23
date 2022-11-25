<?php
    try {
        $dsn = 'mysql:host=localhost;dbname=dwes';
        $user = $passwd = "dwes";
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $dbh = new PDO($dsn, $user, $passwd, $options);

        $sth = $dbh->prepare('SELECT * FROM Ciclistas WHERE id = :id');
        // $sth->bindParam(":id", $_GET["id"]);
        $sth->execute([":id" => $_GET["id"]]);

        // $sth = null;
        $dbh = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

    function mostrarCiclista($consulta) {
        $consulta = $consulta->fetchAll();

        if (count($consulta) == 0) : ?>
            <p><b>404</b> - Ciclista no encontrado</p>
        <?php else : ?>
            <table>
                <tr>
                    <?php foreach ($consulta[0] as $clave => $valor) : ?>
                        <th><?= $clave ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($consulta as $clave => $valor) : ?>
                    <tr>
                        <?php foreach ($valor as $campo => $dato) :
                            if ($campo == "num_trofeos") : ?>
                                <td>
                                    <?php for ($i = 0; $i < $dato; $i++) : ?>
                                        🏆
                                    <?php endfor; ?>
                                </td>
                            <?php else: ?>
                                <td><?= $dato ?></td>
                            <?php endif;
                        endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <a href="./index.php">Volver al inicio</a>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?= mostrarCiclista($sth); ?>
</body>
</html>