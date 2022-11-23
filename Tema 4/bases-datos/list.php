<?php
    try {
        $dsn = 'mysql:host=localhost;dbname=dwes';
        $user = $passwd = "dwes";
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $dbh = new PDO($dsn, $user, $passwd, $options);

        $sth = $dbh->prepare('SELECT nombre FROM Ciclistas WHERE id = :id');
        $sth->bindParam(":id", $_GET["id"]);
        $sth->execute();

        $dbh = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>
<body>
    <?php foreach ($sth->fetchAll() as $clave => $valor) : ?>
        <p><?= $clave ?>: <?= print_r($valor) ?></p>
    <?php endforeach; ?>
</body>
</html>