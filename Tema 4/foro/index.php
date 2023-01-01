<?php
    require_once("./Utils/Autoload.php");
    require_once("./dbh.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forocoches</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php require_once("./header.php") ?>
    <a href="./new-post.php">Nueva publicación</a>
    <?= $dbh->selectAllPosts() ?>
</body>
</html>