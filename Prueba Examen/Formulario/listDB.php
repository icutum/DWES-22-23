<?php
    require("./Utils/Autoload.php");

    use Controller\Form as Form;
    use Controller\DBHandle as DB;

    $dsn = "mysql:host=localhost;dbname=dwes";
    $user = $password = "dwes";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    DB::connect($dsn, $user, $password, $options);
    $dbh = new DB();

    $sth = $dbh->selectAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <table>
        <caption>Lista Bases</caption>
        <tr>
            <?php foreach ($sth[0] as $key => $value) : ?>
                <th><?= $key ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($sth as $row) : ?>
            <tr>
                <?php foreach ($row as $column) : ?>
                    <td><?= $column ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="./index.php">Volver</a>
</body>
</html>