<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    $dsn = 'mysql:host=localhost;dbname=dwes';
    $user = $passwd = "dwes";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $dbh = DB\DBConnection::singleton($dsn, $user, $passwd, $options);

    $dbh->selectAll("Ciclistas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    
</body>
</html>