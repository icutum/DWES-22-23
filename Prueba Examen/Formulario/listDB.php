<?php
    require("./Utils/Autoload.php");

    use Controller\Form as Form;
    use Controller\DBHandle as DB;

    $dsn = "mysql:host=localhost;dbname=dwes";
    $user = $password = "dwes";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $dbh = new DB($dsn, $user, $password, $options);

    $sth = $dbh->selectSearchBar($_GET["text"]);

    if (isset($_POST["delete"]) && isset($_POST["id"])) {
        $dlh = $dbh->deleteRows($_POST["id"]);

        header("Location: ./listDB.php?delete-success=true");

        exit();
    }
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
    <?= $dbh->printTable($sth) ?>

    <a href="./index.php">Volver</a>
</body>
</html>