<?php
    $dsn = "mysql:host=localhost;dbname=examen";
    $user = $password = "examen";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $dbh = new PDO($dsn, $user, $password, $options);
    $sth = $dbh->prepare("INSERT INTO Logs (navegador, timestamp) VALUES (:navegador, :timestamp)");
    $sth->execute([
        ":navegador" => $_SERVER["HTTP_USER_AGENT"],
        ":timestamp" => $_SERVER["REQUEST_TIME"]
    ]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola Mundo</h1>
    <p>Navegador: <?= print_r($_SERVER["HTTP_USER_AGENT"]); ?></p>
    <p>Timestamp: <?= print_r($_SERVER["REQUEST_TIME"]); ?></p>

    <a href="./log.php">Ver registros</a>
</body>
</html>