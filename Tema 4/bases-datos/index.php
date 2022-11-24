<?php
    try {
        $dsn = 'mysql:host=localhost;dbname=dwes';
        $user = $passwd = "dwes";
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Muestra el nombre
            // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM // Muestra el número
            // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH // Muestra ambos
        ];

        $dbh = new PDO($dsn, $user, $passwd, $options);

        // Utilizar la conexión aquí
        if (isset($name)) {
            $sth = $dbh->prepare('SELECT * FROM Ciclistas WHERE nombre LIKE CONCAT("%", :name, "%")');
            $sth->bindParam(":name", $name);
            $sth->execute();

        } else {
            $sth = $dbh->query('SELECT * FROM Ciclistas');
        }

        // Ya se ha terminado; se cierra
        // $sth = null;
        $dbh = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

    function imprimirCiclistas($consulta) { ?>
        <form action="" method="get">
            <input type="text" name="name" placeholder="Ciclista a buscar" value="<?= $_GET["name"] ?>">
            <input type="submit" name="send" value="Buscar">
            <table>
                <tr>
                    <th>Ciclistas</th>
                </tr>
                <?php foreach ($consulta->fetchAll() as $clave => $valor) : ?>
                    <tr>        
                        <td>
                            <a href="./details.php?id=<?=$valor["id"]?>">
                                <?= $valor["nombre"] ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p><b><?= $consulta->rowCount(); ?></b> fila/s afectadas.</p>
        </form>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba BD</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?= imprimirCiclistas($sth) ?>
</body>
</html>