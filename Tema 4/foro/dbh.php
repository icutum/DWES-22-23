<?php
    use Controller\DBHandle as DB;

    $dsn = "mysql:host=localhost;dbname=dwes";
    $user = $password = "dwes";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $dbh = new DB($dsn, $user, $password, $options);
?>