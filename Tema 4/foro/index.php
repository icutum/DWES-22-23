<?php
    require_once("./Utils/Autoload.php");
    require_once("./dbh.php");

    function printPosts($table) { ?>
        <table class="posts">
            <tr class="posts__row">
                <th class="posts__heading">Fecha y hora</th>
                <th class="posts__heading">Usuario</th>
                <th class="posts__heading">Título</th>
            </tr>
            <?php foreach ($table as $row) : ?>

                <tr class="posts__row">
                    <td class="posts__column">
                        <a class="posts__link" href="./post.php?id=<?= $row['id_post'] ?>">
                            <?= date("d/m/Y H:i",$row['timestamp']) ?>
                        </a>
                    </td>
                    <td class="posts__column"><?= $row["user"] ?></td>
                    <td class="posts__column"><?= $row['title'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php }
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
    <main class="main">
        <a class="new-post" href="./new-post.php">Nueva publicación</a>
        <?= printPosts($dbh->selectAllPosts()) ?>
    </main>
</body>
</html>