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
    $sth = $dbh->selectAll();
    print_r($_POST);

    if (isset($_POST["delete"]) && isset($_POST["id"])) {
        $dlh = $dbh->deleteRows($_POST["id"]);

        header("Location: ./listDB.php?success=true");

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
    <form action="" method="post">
        <?php if ($_GET["success"]) : ?>
            <p class="form__success">Se ha borrado correctamente</p>
        <?php endif; ?>
        <table>
            <caption>Lista Bases</caption>
            <tr>
                <th><!--Vacío--></th>
                <?php foreach ($sth[0] as $key => $value) : ?>
                    <th><?= $key ?></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($sth as $row) : ?>
                <tr>
                    <?php foreach ($row as $column => $value) : 
                        if ($column == "id") : ?>
                            <td><input type="checkbox" name="<?= $column ?>[]" value="<?= $value ?>"></td>
                            <td><?= $value ?></td>
                        <?php else : ?>
                            <td><?= $value ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <input type="submit" name="delete" value="Borrar">
    </form>

    <a href="./index.php">Volver</a>
</body>
</html>