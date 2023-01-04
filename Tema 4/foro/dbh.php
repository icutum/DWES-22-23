<?php
    use Controller\DBHandle as DB;

    date_default_timezone_set("Europe/Madrid");

    $dsn = "mysql:host=localhost;dbname=dwes";
    $user = $password = "dwes";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $dbh = new DB($dsn, $user, $password, $options);
?>