<?php
    $dsn = "mysql:host=localhost;dbname=examen";
    $user = $password = "examen";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $dbh = new PDO($dsn, $user, $password, $options);
    $sth = $dbh->query("SELECT navegador, timestamp FROM Logs");
    $table = $sth->fetchAll();

    function printLogs($table) { ?>
        <table>
            <tr>
                <?php foreach (array_keys($table[0]) as $field) : ?>
                    <th><?= ucfirst($field) ?></th>
                <?php endforeach ?>
            </tr>
            <?php foreach ($table as $column) : ?>
                <tr>
                    <td><?= $column["navegador"] ?></td>
                    <td><?= date("d/m/Y H:i", $column["timestamp"]) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?= printLogs($table) ?>
    <a href="./index.php">Volver</a>
</body>
</html>